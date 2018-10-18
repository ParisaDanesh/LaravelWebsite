<?php

namespace App\Http\Controllers;

use App\Comment;
use App\News;
use Illuminate\Http\Request;

class CustomController extends Controller
{
    public function commentEdit(News $news, Comment $comment){
//        dd($comment->body);
        return view('Comment.edit', compact('comment'));

        // hala bbin , ersale news elzami nist, akhe az tariqe comment
        // b news ertebat dar
    }
}
