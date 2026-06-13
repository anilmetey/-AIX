<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Document;
use App\Jobs\ProcessDocument;
use App\Enums\DocumentStatus;
use App\Livewire\Forms\DocumentUploadForm;

class DocumentManager extends Component
{
    use WithFileUploads;

    public DocumentUploadForm $form;
    public $documents;

    public function mount()
    {
        $this->loadDocuments();
    }

    public function loadDocuments()
    {
        $this->documents = auth()->user()->documents()->orderBy('created_at', 'desc')->get();
    }

    public function uploadDocument()
    {
        $this->form->validate();

        $path = $this->form->document->store('documents', 'local');

        $docModel = auth()->user()->documents()->create([
            'name' => pathinfo($this->form->document->getClientOriginalName(), PATHINFO_FILENAME),
            'original_name' => $this->form->document->getClientOriginalName(),
            'path' => $path,
            'status' => DocumentStatus::PENDING,
        ]);

        $this->form->reset();
        $this->loadDocuments();

        // Dispatch the job to process the PDF
        ProcessDocument::dispatch($docModel);
        
        session()->flash('message', 'Document uploaded successfully and is being processed.');
    }

    public function deleteDocument($id)
    {
        $doc = auth()->user()->documents()->findOrFail($id);
        
        // Delete physical file from storage
        if (\Illuminate\Support\Facades\Storage::disk('local')->exists($doc->path)) {
            \Illuminate\Support\Facades\Storage::disk('local')->delete($doc->path);
        }
        
        $doc->delete(); // Chunks will cascade delete
        $this->loadDocuments();
    }

    public function render()
    {
        return view('livewire.document-manager')->layout('layouts.app');
    }
}
