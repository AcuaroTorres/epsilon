<?php

use Illuminate\Database\Seeder;
use Maklad\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = Permission::create(['name' => 'add users']);
        $permission = Permission::create(['name' => 'edit users']);
        $permission = Permission::create(['name' => 'delete users']);
    }
}
