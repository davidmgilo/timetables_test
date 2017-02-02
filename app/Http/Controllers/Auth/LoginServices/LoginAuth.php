<?php

namespace App\Http\Controllers\Auth\LoginServices;

/**
 * Interface LoginAuth
 * @package App\Http\Controllers\Auth\LoginServices
 */
interface LoginAuth
{
    /**
     * Finds the user from the provider in the database.
     *
     * @param $user
     * @return mixed
     */
    public static function findOrCreateUser($user);
}