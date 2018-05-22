<?php

use Multidots\Admin\Model\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        $roles = [
            [
                'name' => 'Super admin',
                'description' => 'This is a super admin role.'
            ],
            [
                'name' => 'Admin',
                'description' => 'This is a admin role.'
            ]
        ];

        foreach ($roles as $key => $value) {
            Role::create($value);
        }
    }
}
