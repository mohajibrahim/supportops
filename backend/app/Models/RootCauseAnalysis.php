<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RootCauseAnalysis extends Model
{
    use HasFactory;

    protected $fillable = [
        'incident_id',
        'summary',
        'category',
        'impact',
        'resolution',
        'preventative_actions',
    ];

    public function incident()
    {
        return $this->belongsTo(Incident::class);
    }
}