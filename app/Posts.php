<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    public $timestamps = true;
    protected $table = 'posts';
    protected $with = ['postReviews'];
    protected $fillable = [
        'user_id',
        'post',
    ];


    /**
     * A post has many reviews
     *
     * @return void
     */
    public function postReviews()
    {
        return $this->hasMany(PostRating::class,'id','id');
    }
}
