<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostRating extends Model
{
    public $timestamps = true;
    protected $table = 'post_rating';
    protected $fillable = [
        'post_id',
        'user_id',
        'rating'
    ];
}
