<?php

namespace App\Observers;

use App\Models\Token;
use App\Models\User;
use Illuminate\Support\Str;

class UserObserver
{
    /**
     * Listen to the User creating event.
     */
    public function creating(User $user): void
    {
        $user->slug = Str::slug($user->name);
        $user->api_token = Token::generate();
    }
}
