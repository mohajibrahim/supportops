<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'priority',
        'reported_by',
        'assigned_to',
        'resolved_at',
    ];

    protected $casts = [
        'resolved_at' => 'datetime',
    ];

    public function rootCauseAnalysis()
    {
        return $this->hasOne(RootCauseAnalysis::class);
    }

    public function knowledgeBaseArticles()
    {
        return $this->belongsToMany(KnowledgeBaseArticle::class, 'incident_kb_articles');
    }
}
