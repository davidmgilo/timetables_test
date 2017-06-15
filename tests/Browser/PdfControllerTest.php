<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Class PdfControllerTest
 * @package Tests\Browser
 */
class PdfControllerTest extends DuskTestCase
{
//    use DatabaseMigrations;

    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Laravel');
        });
    }

    /**
     * Test users are converted correctly to pdf..
     *
     * @return void
     */
//    public function test_users_are_converted_to_pdf_correctly()
//    {
//        $this->browse(function (Browser $browser) {
//            $browser->visit('/pdf/users');
//        });
//    }

    /**
     * Test users are converted correctly to pdf..
     *
     * @return void
     */
//    public function test_users_are_shown_correctly()
//    {
//        //Prepare
//        $users = $this->createUsers(25);
//        //Execute
//
//        //Assert
//
//        $this->browse(function (Browser $browser) {
//            $browser->visit('/pdf/users/view');
//
//            //CSS Selectors
//            $this->assertEquals(25,count($browser->elements('div#users-list table#users-tablelist tr')));
//            $this->assertEquals(2,count($browser->elements('div#users-list table#users-tablelist tr th')));
//        });
//    }

    /**
     * Create users.
     *
     * @param null $num
     * @return mixed
     */
//    private function createUsers($num = null)
//    {
//      return factory(User::class,$num)->create();
//    }

    /**
     * Test a user is converted correctly to pdf..
     * @group failing
     * @return void
     */
//    public function test_user_is_converted_to_pdf_correctly()
//    {
//        $this->browse(function (Browser $browser) {
//            $browser->visit('/pdf/user/1')
//            ->assertSee('todo');
//        });
//    }

//    public function test_user_is_shown_correctly()
//    {
//        //Prepare
//        $user = $this->createUsers();
//        //Execute
//
//        //Assert
//        $this->browse(function (Browser $browser) use ($user){
//            $browser->visit('/pdf/user/'. $user->id)
//                ->assertSee($user->name)
//                ->assertSee($user->email);
//        });
//    }
}
