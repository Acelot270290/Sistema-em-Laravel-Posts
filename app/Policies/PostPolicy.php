<?php

namespace App\Policies;

use App\Models\Postagen;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function delete(Conta $user, Postagen $post)
    {
        return $user->id === $post->conta_id;
    }
}
