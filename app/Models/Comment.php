<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

    class Comment extends Model
{

    protected $fillable = ['content', 'post_id'];

    use HasFactory;

    public function post()
    {
        // көп коммент - 1 постка тиеслі
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        // 1 юзер - көп коммент

        return $this->belongsTo(User::class);
    }
}
