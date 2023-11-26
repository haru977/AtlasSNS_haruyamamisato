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
            ['username' => 'ルフィ',
            'mail' => 'luffy@gmail.com',
            'password' => bcrypt('luffy0000')],
            ['username' => 'ゾロ',
            'mail' => 'zoro@gmail.com',
            'password' => bcrypt('zoro0000')]
        ]);
    }
}
