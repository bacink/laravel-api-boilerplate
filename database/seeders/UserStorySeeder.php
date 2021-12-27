<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;

class UserStorySeeder extends BaseSeeder
{
    /**
     * Credentials
     */
    const ADMIN_CREDENTIALS = [
        'email' => 'admin@admin.com',
    ];

    public function runFake()
    {
        // Grab all roles for reference
        $roles = Role::all();

        // Create an admin user
        \App\Models\User::factory()->create([
            'name'          => 'Admin',
            'pegawai_id'    => '5faea11e-70cf-4741-8d55-e76bf1359e3e',
            'email'         => static::ADMIN_CREDENTIALS['email'],
            'primary_role'  => $roles->where('name', 'admin')->first()->role_id,
        ]);

        // Create regular user
        \App\Models\User::factory()->create([
            'name'         => 'Bob',
            'email'        => 'bob@bob.com',
            'pegawai_id' => '963a2d76-4e8a-460d-97f1-4b5af38bc22a',
            'primary_role' => $roles->where('name', 'regular')->first()->role_id,
        ]);

        // Get some random roles to assign to users
        $fakeRolesToAssignCount = 3;
        $fakeRolesToAssign = RoleTableSeeder::getRandomRoles($fakeRolesToAssignCount);

        // Assign fake roles to users
        for ($i = 0; $i < 5; ++$i) {
            $user = \App\Models\User::factory()->create([
                'primary_role' => $roles->random()->role_id,
            ]);

            for ($j = 0; $j < count($fakeRolesToAssign); ++$j) {
                $user->roles()->save($fakeRolesToAssign->shift());
            }
        }
    }
}
