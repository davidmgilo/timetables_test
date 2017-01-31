<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Mockery;
use Scool\Timetables\Repositories\AttendanceRepository;

/**
 * Class AttendancesControllerTest
 */
class AttendancesControllerTest extends BrowserKitTest
{
    use DatabaseMigrations;

    protected $repository;

    public function __construct()
    {
        // El que s'executa al inici.
        //Mock
        $this->repository = Mockery::mock(AttendanceRepository::class);
    }

    public function tearDown()
    {
        // El que s'executa al final.
        Mockery::close();
    }
    
    public function testIndexNotLogged()
    {
        $this->get('attendances');
        $this->assertRedirectedTo('login');
    }

    public function testIndex()
    {
//        dd(route('attendances.index'));
//        $attendances = factory(\Scool\Timetables\Models\Attendance::class,50)->create();
        $this->login();

        $this->repository->shouldReceive('all')->once()->andReturn(collect(
            $this->createDummyAttendances()
        ));
        $this->repository->shouldReceive('pushCriteria')->once();

        $this->app->instance(AttendanceRepository::class, $this->repository);

        $this->get('attendances');
        $this->assertResponseOk();

        $this->assertViewHas('attendances');

        $attendances = $this->response->getOriginalContent()->getData()['attendances'];
        $this->assertInstanceOf(\Illuminate\Support\Collection::class , $attendances);

        $this->assertEquals(count($attendances),2);

        //1) Preparació -> Isolation/Mocking
        //2) Execució
        //3) Assertions
    }

    public function testStore()
    {
        $this->login();
        $this->post('attendances');

//        $this->assertRedirectedToRoute('attendances.create');
    }

    protected function login()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
    }

    private function createDummyAttendances()
    {
        $attendance1= new \Scool\Timetables\Models\Attendance();
        $attendance2= new \Scool\Timetables\Models\Attendance();

        $attendances= [
          $attendance1,
            $attendance2
        ];
        return collect($attendances);
    }
}
