<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Hardcode roles using DB facade
        DB::table('roles')->insert([
            'name' => 'IT Administrator'
        ]);

        DB::table('roles')->insert([
            'name' => 'User'
        ]);

        DB::table('roles')->insert([
            'name' => 'Manager'
        ]);

        DB::table('roles')->insert([
            'name' => 'Technical Support'
        ]);
    }
}
