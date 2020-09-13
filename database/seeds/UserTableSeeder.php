<?php

use Illuminate\Database\Seeder;
use App\Model\User;
use App\Model\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_superadministrator = Role::where('name', 'superadministrator')->first();
        $role_administrator = Role::where('name', 'administrator')->first();
        $role_phetchaburi  = Role::where('name', 'phetchaburi')->first();
        $role_prachinburi  = Role::where('name', 'prachinburi')->first();
        $role_ranong  = Role::where('name', 'ranong')->first();
        $role_chumphon  = Role::where('name', 'chumphon')->first();

        $superadministrator = new User();
        $superadministrator->name = 'Super Administator';
        $superadministrator->email = 'superadmin@mail.com';
        $superadministrator->password = bcrypt('secret');
        $superadministrator->save();
        $superadministrator->roles()->attach($role_superadministrator);

        $administrator = new User();
        $administrator->name = 'Administator';
        $administrator->email = 'admin@mail.com';
        $administrator->password = bcrypt('secret');
        $administrator->save();
        $administrator->roles()->attach($role_administrator);

        $phetchaburi = new User();
        $phetchaburi->name = 'Admin Phetchaburi';
        $phetchaburi->email = 'phetchaburi@mail.com';
        $phetchaburi->password = bcrypt('secret');
        $phetchaburi->save();
        $phetchaburi->roles()->attach($role_phetchaburi);

        $prachinburi = new User();
        $prachinburi->name = 'Admin Prachinburi';
        $prachinburi->email = 'prachinburi@mail.com';
        $prachinburi->password = bcrypt('secret');
        $prachinburi->save();
        $prachinburi->roles()->attach($role_prachinburi);

        $ranong = new User();
        $ranong->name = 'Admin Ranong';
        $ranong->email = 'ranong@mail.com';
        $ranong->password = bcrypt('secret');
        $ranong->save();
        $ranong->roles()->attach($role_ranong);

        $chumphon = new User();
        $chumphon->name = 'Admin Chumphon';
        $chumphon->email = 'chumphon@mail.com';
        $chumphon->password = bcrypt('secret');
        $chumphon->save();
        $chumphon->roles()->attach($role_chumphon);
    }
}
