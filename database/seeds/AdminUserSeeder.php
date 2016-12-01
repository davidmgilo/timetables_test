<?php

use Illuminate\Database\Seeder;

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
            factory(App\User::class)->create([
                    "name" => "David Martinez",
                    "email" => "davidmgilo@gmail.com",
                    "password" => bcrypt(env('DAVID_PWD', 'secret'))]
            );
        } catch (\Illuminate\Database\QueryException $exception) {
        }
    }
}
