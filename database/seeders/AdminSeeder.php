<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'number' => '1234567890',
            'password' => bcrypt('test1234'),
            'dob' => '2000-02-24',
            'pob' => 'jakarta',
            'gender' => 'male',
            'address' => 'jl.kemanggisan',
            'isAdmin' => true,
        ]);
    }
}
