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
//        $attendances = factory(\Scool\Timetables\Models\Attendance::class,50)->create();
        $user = factory(App\User::class)->create();
        $this->actingAs($user);
        $this->get('attendances');
        $this->assertResponseOk();

        $this->assertViewHas('attendances');

        $attendances = $this->response->getOriginalContent()->getData()['attendances'];
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class , $attendances);

        //1) Preparació
        //2) Execució
        //3) Assertions
    }

    public function testStore()
    {
        
    }
}
