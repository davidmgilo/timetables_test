<?php

namespace App\Http\Controllers\Auth\LoginServices;

use App\User;

class GoogleAuth implements LoginAuth
{
    /**
     * Finds the user from the provider in the database.
     *
     * @param $user
     *
     * @return mixed
     */
    public static function findOrCreateUser($user)
    {
        if ($authUser = User::where('google_id', $user->id)->first()) {
            return $authUser;
        }

        return User::create([
            'name'      => $user->name,
            'email'     => $user->email,
            'google_id' => $user->id,
            'avatar'    => $user->avatar,
            'password'  => bcrypt('secret'),
        ]);
    }
}
