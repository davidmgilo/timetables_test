<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class AttendancesControllerTest
 */
class AttendancesControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function testIndexNotLogged()
    {
        $this->get('attendances');
        $this->assertRedirectedTo('login');
    }

    public function testIndex()
    {
//        dd(route('attendances.index'));
        $user = factory(App\User::class)->create();
        $this->actingAs($user);
        $this->get('attendances');
        $this->assertResponseOk();


        //1) Preparació
        //2) Execució
        //3) Assertions
    }
}
