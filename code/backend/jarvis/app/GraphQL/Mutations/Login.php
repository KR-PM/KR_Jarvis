<?php

namespace App\GraphQL\Mutations;

use App\Exceptions\CustomGraphQLException;
use App\Facades\KCode;
use App\GraphQL\GraphQLKit;
use App\Source\StatusCode\StatusCode;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class Login
{
    public function __invoke($_, array $args)
    {
        $input = $args['input'];
        $account = $input['account'];
        $password = $input['password'];

        $user = User::where('account', $account)->first();
        if ($user === null) {
            GraphQLKit::throwError(KCode::get(StatusCode::ACCOUNT_OR_PASSWORD_ERROR));
        }

        $this->validatePassword($user, $password);

        $user->tokens()->delete();

        return [
            'token' => $user->createToken($account)->plainTextToken,
        ];
    }

    /**
     * @throws CustomGraphQLException
     */
    private function validatePassword(User $user, string $password): void
    {
        if (!Hash::check($password, $user->password)) {
            GraphQLKit::throwError(KCode::get(StatusCode::ACCOUNT_OR_PASSWORD_ERROR));
        }
    }
}
