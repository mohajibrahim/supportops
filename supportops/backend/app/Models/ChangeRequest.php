<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChangeRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'requested_by',
        'status',
        'risk_level',
        'planned_release_at',
        'approved_by',
        'deployment_notes',
    ];

    protected $casts = [
        'planned_release_at' => 'datetime',
    ];
}
