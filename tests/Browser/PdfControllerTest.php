<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Class PdfControllerTest
 * @package Tests\Browser
 */
class PdfControllerTest extends DuskTestCase
{
    /**
     * Test users are converted correctly to pdf..
     *
     * @return void
     */
    public function test_users_are_converted_to_pdf_correctly()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/pdf/users')
                    ->assertSee('todo');
        });
    }

    /**
     * Test a user is converted correctly to pdf..
     * @group failing
     * @return void
     */
    public function test_user_is_converted_to_pdf_correctly()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/pdf/user/1');
            $this->assertStatus(200);
        });
    }
}
