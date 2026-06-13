<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\DocumentChunk;
use App\Models\ChatSession;
use App\Enums\DocumentStatus;
use App\Services\OpenAIService;
use App\Livewire\Forms\ChatForm;

class Chat extends Component
{
    public $sessionId;
    public $documentId;
    public ChatForm $form;
    public $messages = [];

    public function mount($documentId = null)
    {
        $this->documentId = $documentId;
        
        // Find or create session
        $session = ChatSession::where('user_id', auth()->id())
            ->where('document_id', $this->documentId)
            ->first();

        if (!$session) {
            $session = ChatSession::create([
                'user_id' => auth()->id(),
                'document_id' => $this->documentId,
                'title' => 'New Chat',
            ]);
        }

        $this->sessionId = $session->id;
        $this->loadMessages();
    }

    public function updatedDocumentId($value)
    {
        // When user changes the document from the dropdown, find or create the new session
        $session = ChatSession::where('user_id', auth()->id())
            ->where('document_id', $value ?: null)
            ->first();

        if (!$session) {
            $session = ChatSession::create([
                'user_id' => auth()->id(),
                'document_id' => $value ?: null,
                'title' => 'New Chat',
            ]);
        }

        $this->sessionId = $session->id;
        $this->loadMessages();
    }

    public function loadMessages()
    {
        $session = ChatSession::find($this->sessionId);
        if ($session) {
            $this->messages = $session->messages()->orderBy('created_at', 'asc')->get()->toArray();
        }
    }

    public function clearChat()
    {
        $session = ChatSession::find($this->sessionId);
        if ($session) {
            $session->messages()->delete();
            $this->messages = [];
        }
    }

    public function sendMessage()
    {
        $this->form->validate();

        $cost = config("ai.models.{$this->form->aiModel}.cost", 1);

        if (auth()->user()->credits < $cost) {
            session()->flash('error', "You need {$cost} credits to use {$this->form->aiModel}. Please recharge.");
            return;
        }

        $messageContent = $this->form->newMessage;
        $this->form->newMessage = '';

        // Save user message
        $session = ChatSession::find($this->sessionId);
        $session->messages()->create([
            'role' => 'user',
            'content' => $messageContent,
        ]);

        $this->loadMessages();

        // Prepare context from document if needed
        $context = '';
        $openAIService = app(OpenAIService::class);
        
        if ($this->documentId) {
            $context = $openAIService->getRelevantContext($messageContent, $this->documentId);
        }

        // Call OpenAI
        $systemPrompt = "You are a helpful corporate AI assistant. Answer the user's questions. ";
        if ($context) {
            $systemPrompt .= "Use the following context from the user's document to answer the question:\n\n" . $context;
        }

        $apiMessages = [
            ['role' => 'system', 'content' => $systemPrompt]
        ];

        // Add history (last 5 messages)
        $history = $session->messages()->orderBy('created_at', 'desc')->take(5)->get()->reverse();
        foreach ($history as $msg) {
            $apiMessages[] = ['role' => $msg->role, 'content' => $msg->content];
        }

        try {
            $answer = $openAIService->chat($this->form->aiModel, $apiMessages);

            // Save assistant message
            $session->messages()->create([
                'role' => 'assistant',
                'content' => $answer,
            ]);

            // Deduct credit based on model
            auth()->user()->decrement('credits', $cost);
            auth()->user()->creditTransactions()->create([
                'amount' => -$cost,
                'description' => "Chat message using {$this->form->aiModel}",
            ]);

        } catch (\Exception $e) {
            $session->messages()->create([
                'role' => 'system',
                'content' => 'Error: ' . $e->getMessage(),
            ]);
        }

        $this->loadMessages();
    }

    public function render()
    {
        $documents = auth()->user()->documents()->where('status', DocumentStatus::COMPLETED)->get();
        return view('livewire.chat', compact('documents'))->layout('layouts.app');
    }
}
