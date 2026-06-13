<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['user_id', 'name', 'original_name', 'path', 'status'];

    protected $casts = [
        'status' => \App\Enums\DocumentStatus::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function chunks()
    {
        return $this->hasMany(DocumentChunk::class);
    }

    public function chatSessions()
    {
        return $this->hasMany(ChatSession::class);
    }
}
