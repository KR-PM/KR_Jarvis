<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use Auth;

class Logout
{
    public function __invoke($_, array $args)
    {
        /** @var User $user */
        $user = Auth::user();

        $user->tokens()->delete();

        return [
            'success' => true,
        ];
    }
}
