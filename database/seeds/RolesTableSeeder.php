<?php

use Illuminate\Database\Seeder;
use Maklad\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$role = Role::create(['name' => 'admin']);
    	$role = Role::create(['name' => 'other']);
    }
}
