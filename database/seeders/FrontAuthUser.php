<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FrontAuthUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'テストユーザ',
            'email' => 'hoge@example.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => Hash::make('pass'),
        ]);      
    }
}
