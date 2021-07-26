<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'Admin - Veto Wardana Putra',
        	'email' => 'veto@admin.com',
        	'password' => bcrypt('Veto4119.'),
        	'level' => 'admin',
        	'remember_token' => Str::random(60)
        ]);
    }
}
