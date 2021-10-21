<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = "comments";

    // the fields to be used / modified
    protected $fillable = ['content'];

    public function getPost()
    {
        return $this->belongsTo(Post::class, 'id', 'post');
    }
}
