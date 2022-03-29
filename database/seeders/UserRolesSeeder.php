<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\UserRole;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['admin', 'employee', 'personnel'];

        foreach ($roles as $role)
        {

            UserRole::create([
                'name' => strtoupper($role),
            ]);
        }
    }
}
