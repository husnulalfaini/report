<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' =>'husnul',
            'email' =>'admin@gmail.com',
            'telepon' =>'087777',
            'status' =>'1',
            'password' =>bcrypt('admin'),
            'role' =>'user',
            'remember_token' =>Str::random(60),
        ]);
    }
}

