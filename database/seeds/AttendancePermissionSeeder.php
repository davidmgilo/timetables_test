<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

/**
 * Class AttendancePermissionSeeder
 *
 * Seeds the laravel-permission database with permissions for model Attendance
 */
class AttendancePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'browse attendances']);
        Permission::create(['name' => 'read attendances']);
        Permission::create(['name' => 'edit attendances']);
        Permission::create(['name' => 'add attendances']);
        Permission::create(['name' => 'delete attendances']);
        $role = Role::create(['name' => 'manage attendances']);
        $role->givePermissionTo('browse attendances');
        $role->givePermissionTo('read attendances');
        $role->givePermissionTo('edit attendances');
        $role->givePermissionTo('add attendances');
        $role->givePermissionTo('delete attendances');
    }
}
