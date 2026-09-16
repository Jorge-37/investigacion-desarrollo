<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
     protected $fillable = [
        'institution',
        'title',
        'description',
        'visit_date',
        'image',
    ];

    protected $casts = [
        'visit_date' => 'date',
    ];

    public function images()
    {
        return $this->hasMany(VisitImage::class);
    }
}
