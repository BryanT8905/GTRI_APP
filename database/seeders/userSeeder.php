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
        //User::factory()->times(10)->create();
        $password = 'password';

        DB::table('users')->insert([
            'name' => 'admin',
            'username' => 'admin1',
            'email' => 'admin@example.com',
            'password' => Hash::make($password),
            'image' => 'user.png'
        ]);
    }
}
