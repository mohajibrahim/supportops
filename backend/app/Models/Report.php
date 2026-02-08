<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'sql_query',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}