<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $fillable = [
        'title',
        'description',
        'training_date',
        'image',
    ];

    protected $casts = [
        'training_date' => 'date',
    ];
}
