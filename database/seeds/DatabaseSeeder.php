<?php

use Illuminate\Database\Seeder;
use Scool\Timetables\Database\Seeds\TimetablesSeeder;

/**
 * Class DatabaseSeeder.
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionLessonSeeder::class);
        $this->call(AdminUserSeeder::class);
        $this->call(TimetablesSeeder::class);
    }
}
