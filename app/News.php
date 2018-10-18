<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

use Eloquent as Model;

class News extends Model
{
    public  $table="news";
    protected $fillable=['title','body','user_id'];

    public function likes(){
        return $this->hasMany(Likes::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
