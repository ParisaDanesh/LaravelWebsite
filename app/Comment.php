<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $table = "comment";

    protected $fillable = ['user_id','news_id','body'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function News(){
        return $this->belongsTo(News::class);
    }
}
