<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => 'superadministrator','description' => 'Super Administrator User'],
            ['name' => 'administrator','description' => 'Administrator User'],
            ['name' => 'phetchaburi','description' => 'Admin Phetchaburi'],
            ['name' => 'prachinburi','description' => 'Admin Prachinburi'],
            ['name' => 'ranong','description' => 'Admin Ranong'],
            ['name' => 'chumphon','description' => 'Admin Chumphon'],
            ['name' => 'employee','description' => 'Employee']
        ]);
    }
}
