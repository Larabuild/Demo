<?php

namespace Larabuild\Cms\Observers;

use Larabuild\Cms\Post;

class PostObserver
{
    /**
     * Listen to the User created event.
     *
     * @param  User  $user
     * @return void
     */
    public function creating(Post $user)
    {
        //dd('test');
    }

    /**
     * Listen to the User deleting event.
     *
     * @param  User  $user
     * @return void
     */
    public function deleting(Post $user)
    {
        //
    }
}
