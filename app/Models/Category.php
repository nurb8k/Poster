<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

//    protected $fillable = ['name'];

    public function posts()
    {
        # Category has a many posts
        return $this->hasMany(Post::class);
    }
}
