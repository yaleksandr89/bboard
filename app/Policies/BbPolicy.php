<?php

namespace App\Policies;

use App\Models\Bb;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BbPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Bb $bb): bool
    {
        return $user->id === $bb->user->id;
    }

    public function destroy(User $user, Bb $bb): bool
    {
        return $this->update($user, $bb);
    }
}
