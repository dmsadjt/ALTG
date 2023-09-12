<?php

namespace App\Policies;

use App\Models\Ship;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CreatePolicy
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

    public function update(User $user): bool
    {
        return $user->id == 1;
    }
}
