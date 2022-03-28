<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class UsersSeeder extends Seeder
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
            $password = bcrypt($role.'pitogoportal');

            User::create([
                'name' => ucwords($role).' Account',
                'email' => $role.'@pitogo-portal.com',
                'password' => $password
            ]);
        }
    }
}
