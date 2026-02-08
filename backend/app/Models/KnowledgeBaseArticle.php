<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KnowledgeBaseArticle extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'content',
        'visibility',
    ];

    public function incidents()
    {
        return $this->belongsToMany(Incident::class, 'incident_kb_articles');
    }
}
