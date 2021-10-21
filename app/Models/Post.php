<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = "posts";

    // the fields to be used / modified
    protected $fillable = ['title', 'extrait', 'description', 'picture'];


    public function comments()
    {
        return $this->hasMany(Comment::class, 'post', 'id');
    }

    public function countComments()
    {
        // return sizeof($this->comments);

        return count($this->comments);
    }
}
