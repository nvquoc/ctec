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
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@localhost.com',
            'password' => bcrypt('123456'),
            'avatar' => 'avatar.png',
            'rule' => '1',
            'created_at' => new DateTime(),
        ]);
    }
}
