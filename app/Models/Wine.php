<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wine extends Model
{
    use HasFactory;

    public function flavors()
    {
        return $this->belongsToMany(Flavor::class);
    }
    protected $fillable = [
        'winery',
        'wine',
        'slug',
        'rating_average',
        'rating_reviews',
        'location',
        'image',
        // 'flavor_id'
    ];
}
