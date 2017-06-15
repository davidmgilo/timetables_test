<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TimetablesTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testNotAuthorized()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/home')
                ->assertPathIs('/login');
        });
    }

//    public function testLogin()
//    {
//        $user = factory(User::class)->create(
//            [
//                'email' => 'taylor@laravel.com',
//                'password' => 'secret'
//            ]
//        );
//        $this->browse(function (Browser $browser)  use ($user) {
//            $browser->visit('/home')
//                ->assertPathIs('/login')
//                ->pause(1000)
//                ->type('email', $user->email)
//                ->pause(1000)
//                ->type('password', $user->password)
//                ->pause(1000)
//                ->press('Sign In')
//                ->pause(1000)
//                ->assertPathIs('/home')
//                ->pause(1000)
//                ->assertSee($user->name);
//        });
//    }
}
