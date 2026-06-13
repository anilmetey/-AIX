<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Document;
use Smalot\PdfParser\Parser;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Enums\DocumentStatus;
use App\Services\OpenAIService;

class ProcessDocument implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 300; // 5 minutes timeout for large PDFs
    protected $document;

    public function __construct(Document $document)
    {
        $this->document = $document;
    }

    public function handle(): void
    {
        $this->document->update(['status' => DocumentStatus::PROCESSING]);

        try {
            // Get full path to the PDF
            $path = Storage::disk('local')->path($this->document->path);

            // Parse PDF
            $parser = new Parser();
            $pdf = $parser->parseFile($path);
            $text = $pdf->getText();

            // Advanced Chunking with Overlap (1000 chars size, 200 overlap)
            $chunkSize = 1000;
            $overlap = 200;
            $chunks = [];
            $textLength = strlen($text);
            
            for ($i = 0; $i < $textLength; $i += ($chunkSize - $overlap)) {
                $chunkText = substr($text, $i, $chunkSize);
                if (trim($chunkText) !== '') {
                    $chunks[] = $chunkText;
                }
            }

            foreach ($chunks as $chunkContent) {
                if (trim($chunkContent) === '') continue;

                // Get embedding from OpenAI via Service
                $openAIService = app(OpenAIService::class);
                $embedding = $openAIService->generateEmbedding($chunkContent);

                $this->document->chunks()->create([
                    'content' => $chunkContent,
                    'embedding' => $embedding,
                ]);
            }

            $this->document->update(['status' => DocumentStatus::COMPLETED]);

        } catch (\Exception $e) {
            Log::error('PDF Processing failed: ' . $e->getMessage());
            $this->document->update(['status' => DocumentStatus::FAILED]);
            throw $e;
        }
    }
}
