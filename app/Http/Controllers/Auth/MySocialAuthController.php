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
     * @param $provider
     * @return mixed
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Auths with user from provider. If they doesn't exist, it creates them.
     *
     * @param $provider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            return Redirect::to('auth/'.$provider);
        }

        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return Redirect::to('home');
    }

    /**
     * Finds the user from the provider in the database.
     *
     * @param $User
     * @param $provider
     * @return User
     */
    private function findOrCreateUser($User, $provider)
    {
        switch ($provider) {
            case 'github' :
                return $this->findOrcreateGithubUser($User);
                break;
            default:
                break;
        }


    }

    /**
     *  Finds the github user in the database. If they doesn't exist, it creates them.
     *
     * @param $githubUser
     * @return mixed
     */
    public function findOrcreateGithubUser($githubUser)
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
