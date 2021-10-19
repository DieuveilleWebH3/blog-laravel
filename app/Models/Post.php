<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = "posts";

    // the fields to be used / modified
    protected $fillable = ['title', 'description','extrait'];

    // the fields not to consider
    // protected $guarded = [];
}
