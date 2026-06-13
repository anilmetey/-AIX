<?php

namespace App\Services;

use OpenAI\Laravel\Facades\OpenAI;
use App\Models\DocumentChunk;

class OpenAIService
{
    /**
     * Send a message to OpenAI and get the response
     */
    public function chat(string $model, array $messages): string
    {
        if (!config('ai.api_key')) {
            return "This is a mocked {$model} response since OPENAI_API_KEY is not configured.";
        }

        try {
            $response = OpenAI::chat()->create([
                'model' => $model,
                'messages' => $messages,
            ]);

            return $response->choices[0]->message->content;
        } catch (\Exception $e) {
            \Log::error('OpenAI Chat Error: ' . $e->getMessage());
            throw new \Exception('Yapay zeka ile iletişim kurulamadı: ' . $e->getMessage());
        }
    }

    /**
     * Generate an embedding vector for a given text
     */
    public function generateEmbedding(string $text): array
    {
        if (!config('ai.api_key')) {
            return array_fill(0, 1536, 0.0);
        }

        try {
            $response = OpenAI::embeddings()->create([
                'model' => config('ai.embeddings.model', 'text-embedding-3-small'),
                'input' => $text,
            ]);

            return $response->embeddings[0]->embedding;
        } catch (\Exception $e) {
            \Log::error('OpenAI Embedding Error: ' . $e->getMessage());
            throw new \Exception('Embedding oluşturulamadı.');
        }
    }

    /**
     * Get relevant context using cosine similarity
     */
    public function getRelevantContext(string $query, int $documentId): string
    {
        if (!config('ai.api_key')) {
            $chunk = DocumentChunk::where('document_id', $documentId)->first();
            return $chunk ? $chunk->content : '';
        }

        $queryEmbedding = $this->generateEmbedding($query);
        $chunks = DocumentChunk::where('document_id', $documentId)->get();

        $similarities = [];
        foreach ($chunks as $chunk) {
            $chunkEmbedding = $chunk->embedding;
            if (!$chunkEmbedding) continue;

            $similarity = $this->cosineSimilarity($queryEmbedding, $chunkEmbedding);
            $similarities[] = [
                'chunk' => $chunk,
                'score' => $similarity
            ];
        }

        // Sort descending
        usort($similarities, function($a, $b) {
            return $b['score'] <=> $a['score'];
        });

        // Get top K chunks
        $topK = config('ai.embeddings.top_k', 3);
        $topChunks = array_slice($similarities, 0, $topK);
        
        $context = "";
        foreach ($topChunks as $item) {
            $context .= $item['chunk']->content . "\n\n";
        }

        return $context;
    }

    private function cosineSimilarity(array $vecA, array $vecB): float
    {
        $dotProduct = 0;
        $normA = 0;
        $normB = 0;

        $count = min(count($vecA), count($vecB));
        for ($i = 0; $i < $count; $i++) {
            $dotProduct += $vecA[$i] * $vecB[$i];
            $normA += $vecA[$i] * $vecA[$i];
            $normB += $vecB[$i] * $vecB[$i];
        }

        if ($normA == 0 || $normB == 0) return 0;
        
        return $dotProduct / (sqrt($normA) * sqrt($normB));
    }
}
