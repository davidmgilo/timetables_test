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

    public function setUp()
    {
        // El que s'executa al inici.
        //Mock
        $this->repository = Mockery::mock(StudyRespository::class);
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
        $this->login();
        $this->post('attendances');

        $this->assertRedirectedToRoute('attendances.create');
    }

    protected function login()
    {
        $user = factory(App\User::class)->create();
        $this->actingAs($user);
    }
}
