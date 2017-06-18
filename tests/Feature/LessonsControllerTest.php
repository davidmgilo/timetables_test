<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Mockery;
use Scool\Timetables\Repositories\LessonRepository;

/**
 * Class LessonsControllerTest.
 */
class LessonsControllerTest extends BrowserKitTest
{
    use DatabaseMigrations;

    protected $repository;

    public function __construct()
    {
        // El que s'executa al inici.
        //Mock
        $this->repository = Mockery::mock(LessonRepository::class);
    }

    public function tearDown()
    {
        // El que s'executa al final.
        Mockery::close();
    }

    public function testIndexNotLogged()
    {
        $this->get('lessons');
        $this->assertRedirectedTo('login');
    }

    public function testIndex()
    {
        //        dd(route('attendances.index'));
//        $attendances = factory(\Scool\Timetables\Models\Attendance::class,50)->create();
        $this->login();

        $this->repository->shouldReceive('all')->once()->andReturn(collect(
            $this->createDummyLessons()
        ));
        $this->repository->shouldReceive('pushCriteria')->once();

        $this->app->instance(LessonRepository::class, $this->repository);

//
//        $this->get('lessons');
//        $this->assertResponseOk();
//
//        $this->assertViewHas('lessons');
//
//        $lessons = $this->response->getOriginalContent();
//        dd($lessons);
//        $this->assertInstanceOf(\Illuminate\Support\Collection::class , $lessons);
//
//        $this->assertEquals(count($lessons),2);

        //1) Preparació -> Isolation/Mocking
        //2) Execució
        //3) Assertions
    }

    public function testStore()
    {
        //        $this->login();
//        $this->post('lessons');

//        $this->assertRedirectedToRoute('attendances.create');
    }

    protected function login()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
    }

    private function createDummyLessons()
    {
        $lesson1 = new \Scool\Timetables\Models\Lesson();
        $lesson2 = new \Scool\Timetables\Models\Lesson();

        $lessons = [
          $lesson1,
            $lesson2,
        ];

        return collect($lessons);
    }
}
