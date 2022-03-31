<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\UserRole;

class UserUserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = User::find(1);
        $adminUser->user_roles()->attach(
            UserRole::find(1)
        );

        $employeeUser = User::find(2);
        $employeeUser->user_roles()->attach(
            UserRole::find(2)
        );

        $personnelUser = User::find(3);
        $personnelUser->user_roles()->attach(
            UserRole::find(3)
        );
    }
}
