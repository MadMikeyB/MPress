<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        // Is Admin?
        $gate->before(function ($user, $ability) {
            if ($user->isAdmin()) {
                // Allow everything. Update, creation, deletion of everything.
                return true;
            }
            // if ( $user->isEditor() )
            // {
            //     // allow update-post
            //     // allow edit-post
            //     // allow-edit-comment
            //     return ['update-post', 'edit-post', 'edit-comment'];
            // }
        });
        
        // [20:14]  <lagbox> foreach ([... ability name ...] as $name) { $gate->define($name, function ($user, $resource) { ... }); } perhaps

        // Can Comment
        $gate->define('create-comment', function ($user, $comment) {
            return \Auth::check();
        });
        // Can Edit Comment
        $gate->define('edit-comment', function ($user, $comment) {
            return $user->id === $comment->author_id; // @todo add group check for editors
        });
        // Can Update Comment
        $gate->define('update-comment', function ($user, $comment) {
            return $user->id === $comment->author_id; // @todo add group check for editors
        });
        // Can Delete Comment
        $gate->define('delete-comment', function ($user, $comment) {
            return $user->id === $comment->author_id;
        });
        // Can Create Post
        $gate->define('create-post', function ($user, $post) {
            return $user->group == '1'; // Admin Only
        });
        // Can Edit Post
        $gate->define('edit-post', function ($user, $post) {
            return $user->id === $post->author_id; // @todo add group check for editors
        });
        // Can Update Post?
        $gate->define('update-post', function ($user, $post) {
            return $user->id === $post->author_id; // @todo add group check for editors
        });
        // Can Delete Post
        $gate->define('delete-post', function ($user, $post) {
            return $user->id === $post->author_id;
        });
        // Can Edit User
        $gate->define('edit-user', function ($user, $loggedInUser) {
            return $user->id === $loggedInUser->id;
        });
    }
}
