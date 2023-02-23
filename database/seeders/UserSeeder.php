<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()

        {

                    User::create([
                    'id' => 1,
                    'name'=> 'Bob One',
                    'email' => 'bob1@fake.com', 'password' => Hash::make('password'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);


                    User::create([
                    'id' => 2,
                    'name'=> 'Bob Two',
                    'email' => 'bob2@fake.com',
                        'password' => Hash::make('password'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                        ]);


                    User::create([
                    'id' => 3,
                    'name'=> 'Bob Three',
                    'email' => 'bob3@fake.com',
                        'password' => Hash::make('password'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);



    }
}
