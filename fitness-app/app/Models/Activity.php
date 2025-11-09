<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'time_start',
        'time_end',
        'activity',
        'time_spent',
        'distance',
        'set_count',
        'reps',
        'note',
    ];

    protected $casts = [
        'date' => 'date',
        'set_count' => 'integer',
        'reps' => 'integer',
    ];
}
