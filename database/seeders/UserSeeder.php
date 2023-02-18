<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create([
            'status' => User::STATUS_ACTIVE,
            'type' => User::TYPE_USER,
            'first_name' => 'Vadim',
            'last_name' => 'Antonovich',
            'email' => 'example@gmail.com',
            'password' => 'qwerty12',
        ]);

        User::create([
            'status' => User::STATUS_INACTIVE,
            'type' => User::TYPE_VENDOR,
            'first_name' => 'Oleg',
            'last_name' => 'Bukovskiy',
            'email' => 'example123@gmail.com',
            'password' => 'qwerty12',
        ]);

        User::create([
            'status' => User::STATUS_INACTIVE,
            'type' => User::TYPE_VENDOR,
            'first_name' => 'Viktor',
            'last_name' => 'Orudzhev',
            'email' => 'example125@gmail.com',
            'password' => 'qwerty12',
        ]);

        User::create([
            'status' => User::STATUS_INACTIVE,
            'type' => User::TYPE_VENDOR,
            'first_name' => 'Aleks',
            'last_name' => 'Kostylev',
            'email' => 'example126@gmail.com',
            'password' => 'qwerty12',
        ]);

        User::create([
            'status' => User::STATUS_ACTIVE,
            'type' => User::TYPE_USER,
            'first_name' => 'Andrey',
            'last_name' => 'Pavliuk',
            'email' => 'example128@gmail.com',
            'password' => 'qwerty12',
        ]);

        User::create([
            'status' => User::STATUS_ACTIVE,
            'type' => User::TYPE_USER,
            'first_name' => 'Denis',
            'last_name' => 'Sharipov',
            'email' => 'example229@gmail.com',
            'password' => 'qwerty12',
        ]);
        
    }
}
