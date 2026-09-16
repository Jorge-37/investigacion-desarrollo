<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'section',
        'type',
        'name',
        'title',
        'description',
        'image',
    ];
}
