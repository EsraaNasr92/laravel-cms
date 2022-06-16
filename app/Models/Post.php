<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable =[
        'title',
        'slug',
        'excerpt',
        'body',
        'image',
        'published_at'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
