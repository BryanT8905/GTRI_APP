<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create 50 users
        User::factory()->times(50)->create();
        $password = 'password';

        //create an admin
        DB::table('users')->insert([
            'name' => 'admin',
            'username' => 'admin1',
            'email' => 'admin@example.com',
            'department' => 'IT Department',
            'password' => Hash::make($password)
        ]);
    }
}
