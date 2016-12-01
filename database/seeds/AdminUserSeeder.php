<?php

use App\User;
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
            factory(User::class)->create([
                    "name" => "David Martinez",
                    "email" => "davidmgilo@gmail.com",
                    "password" => bcrypt(env('DAVID_PWD', 'secret'))]
            );
        } catch (\Illuminate\Database\QueryException $exception) {
        }
    }
}
