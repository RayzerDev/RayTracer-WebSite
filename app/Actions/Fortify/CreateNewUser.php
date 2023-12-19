<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Traits\ImageStoreInStorage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules, ImageStoreInStorage;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'nom' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
                'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        if (isset($input['avatar'])) {
            $avatarPath = $this->saveAvatar($input['avatar']);
        }

        return User::create([
            'nom' => $input['nom'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'avatar' => $avatarPath ?? null,
        ]);
    }
}
