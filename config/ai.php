<?php

return [
    /*
    |--------------------------------------------------------------------------
    | OpenAI API Key
    |--------------------------------------------------------------------------
    */
    'api_key' => env('OPENAI_API_KEY'),

    /*
    |--------------------------------------------------------------------------
    | AI Models and Pricing
    |--------------------------------------------------------------------------
    |
    | Centralized configuration for AI models used in the chat.
    |
    */
    'models' => [
        'gpt-3.5-turbo' => [
            'name' => 'GPT-3.5 Hızlı',
            'cost' => 1,
            'description' => 'Standart AI Modelleri (1 kredi)'
        ],
        'gpt-4o' => [
            'name' => 'GPT-4o Akıllı',
            'cost' => 3,
            'description' => 'GPT-4o Erişimi (Süper Zeka)'
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Embedding Settings
    |--------------------------------------------------------------------------
    */
    'embeddings' => [
        'model' => 'text-embedding-3-small',
        'chunk_size' => 1000,
        'similarity_threshold' => 0.7,
        'top_k' => 3,
    ],
];
