<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content','post_id'];
    use HasFactory;
    # posts - ta kop komment bola alad,
    # posts->belongsToComment & comments--> hasMany;
    # user--> hasMany Comments ; comments->belongsto USER
    public function posts(){
        return $this->belongsTo(Post::class);
    }
    public function users(){
        return $this->hasMany(User::class);
    }
}
