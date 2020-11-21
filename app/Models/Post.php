<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $connection = 'mysql';

    protected $fillable = ['user_id' , 'title' , 'content' , 'status' ];

    public function comments()
    {
        return $this->hasMany('App\Models\Comment' , 'post_id');
    }

    public function likes()
    {
        return $this->hasMany('App\Models\Like' , 'post_id');
    }
}
