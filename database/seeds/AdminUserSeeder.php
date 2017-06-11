<?php

use Illuminate\Database\Seeder;

/**
 * Class AdminUserSeeder
 */
class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            $user = factory(App\User::class)->create([
                    "name" => "David Martinez",
                    "email" => "davidmgilo@gmail.com",
                    "password" => bcrypt(env('ADMIN_PWD', '123456'))]
            );
            $user->assignRole('manage lessons');
        } catch (\Illuminate\Database\QueryException $exception) {

        }
    }
}