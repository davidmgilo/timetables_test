<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class PermissionLessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'browse lessons']);
        Permission::create(['name' => 'read lessons']);
        Permission::create(['name' => 'edit lessons']);
        Permission::create(['name' => 'add lessons']);
        Permission::create(['name' => 'delete lessons']);
        $role = Role::create(['name' => 'manage lessons']);
        $role->givePermissionTo('browse lessons');
        $role->givePermissionTo('read lessons');
        $role->givePermissionTo('edit lessons');
        $role->givePermissionTo('add lessons');
        $role->givePermissionTo('delete lessons');
    }
}
