<?php

namespace App\Providers;

use App\Comment;
use App\News;
use App\Policies\CommentPolicy;
use App\Policies\NewsPolicy;
use App\Policies\UserPolicy;
use App\User;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
//        User::class => UserPolicy::class,
        Comment::class => CommentPolicy::class,
        News::class => NewsPolicy::class,
        // nokte baad in k ag mikhai az ye policy use kOni ba on sakhtari k gofti bayad inja ezafash kOni

        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(Gate $gate)
    {
        $this->registerPolicies();

        //define
        $gate->define('commentEdit','App\\Policies\\MyPolicies@commentEdit');

    }
}
