<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

/**
 * Class MisTestos
 */
class AuthorizationTest extends TestCase
{
    use DatabaseMigrations;

    public function testIndexNotLogged()
    {
        $response = $this->get('/lessons');
        $this->assertEquals(302, $response->status());
    }

//    public function testAuthorizedIndex()
//    {
//        $user = $this->login();
//        dd($user->hasPermissionTo('browse lessons'));
//        $response = $this->get('/lessons');
//        $this->assertEquals(200, $response->status());
//    }

    public function testNotAuthorizedIndex()
    {
        $user = $this->loginNotAuthorized();
        $response = $this->get('/lessons');
        $this->assertEquals(403, $response->status());
    }

    protected function login()
    {
        $user = factory(\App\User::class)->create();
        Permission::create(['name' => 'browse lessons']);
        $user->givePermissionTo('browse lessons');
        $this->actingAs($user);
        return $user;
    }

    protected function loginNotAuthorized()
    {
        $user = factory(\App\User::class)->create();
        $this->actingAs($user);
        return $user;
    }

}