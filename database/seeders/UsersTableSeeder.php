<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
//                'username' => 'william.jda@hotmail.com',
                'username' => 'user'.rand(1,200).'@email.com',
                'password' => bcrypt('123456'),
                'created_at' => date('Y-m-d H:i:s')
            ],
        );
    }
}
