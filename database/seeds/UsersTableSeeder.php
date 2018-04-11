<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create(
        	['run' => 152875827, 'name'=>'Alvaro Torres', 'email'=>'a@b.d', 'password' => bcrypt('jokers')]);
    }
}
