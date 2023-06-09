<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }



    // how to get the category by slug
    public function getRouteKeyName()
    {
        return 'slug';
    }


}
