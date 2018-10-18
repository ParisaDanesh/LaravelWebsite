<?php

namespace App\Policies;

use App\Comment;
use App\News;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MyPolicies
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }


    public function commentEdit(User $user , Comment $comment, News $news){
        return $user->id == $comment->user_id;
    }

}
