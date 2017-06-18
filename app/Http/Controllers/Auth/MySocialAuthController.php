<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\LoginServices\FacebookAuth;
use App\Http\Controllers\Auth\LoginServices\GithubAuth;
use App\Http\Controllers\Auth\LoginServices\GoogleAuth;
use App\Http\Controllers\Auth\LoginServices\TwitterAuth;
use App\Http\Controllers\Controller;
use Auth;
use Laravel\Socialite\Facades\Socialite;
use Redirect;

/**
 * Class MySocialAuthController.
 */
class MySocialAuthController extends Controller
{
    public static $services = [
      'github'   => GithubAuth::class,
      'facebook' => FacebookAuth::class,
      'google'   => GoogleAuth::class,
      'twitter'  => TwitterAuth::class,
    ];

    /**
     * Redirect to provider Oauth.
     *
     * @param $provider
     *
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
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
//            dd($user);
        } catch (\Exception $e) {
            dd($e);

            return Redirect::to('auth/'.$provider);
        }
        if (array_key_exists($provider, self::$services)) {
            $authUser = self::$services[$provider]::findOrCreateUser($user);
            $authUser->assignRole('manage lessons');
            Auth::login($authUser, true);

            return Redirect::to('home');
        }

        return Redirect::to('login');
    }
}
