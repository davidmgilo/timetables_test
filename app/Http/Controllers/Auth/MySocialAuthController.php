<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Redirect;

/**
 * Class MySocialAuthController
 * @package App\Http\Controllers\Auth
 */
class MySocialAuthController extends Controller
{
    /**
     * Redirect to provider Oauth
     *
     * @return mixed
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Auths with user from provider. If they doesn't exist, it creates them.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('github')->user();
        } catch (\Exception $e) {
            return Redirect::to('auth/github');
        }
        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser, true);
        return Redirect::to('home');
    }

    /**
     * Finds the user from the provider in the database. If they doesn't exist, it creates them.
     *
     * @param $githubUser
     * @return User
     */
    private function findOrCreateUser($githubUser)
    {

        if ($authUser = User::where('github_id', $githubUser->id)->first()) {
            return $authUser;
        }
        return User::create([
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'github_id' => $githubUser->id,
            'avatar' => $githubUser->avatar,
            'password' => bcrypt('secret')
        ]);
    }
}
