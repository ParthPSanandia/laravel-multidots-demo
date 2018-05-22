<?php

use Multidots\Admin\Model\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::truncate();
        $permission = [
            [
                'parent_id' => 0,
                'title' => 'Settings',
                'permission_key' => 'settings'
            ],
            [
                'parent_id' => 1,
                'title' => 'Personal Info',
                'permission_key' => 'manage-personal-info'
            ],
            [
                'parent_id' => 1,
                'title' => 'Edit Profile',
                'permission_key' => 'account-edit-profile'
            ],
            [
                'parent_id' => 1,
                'title' => 'Change Password',
                'permission_key' => 'change-password'
            ],
            [
                'parent_id' => 1,
                'title' => 'Change Avatar',
                'permission_key' => 'change-avatar'
            ],
            [
                'parent_id' => 1,
                'title' => 'Remove Avatar',
                'permission_key' => 'remove-avatar'
            ],
            [
                'parent_id' => 0,
                'title' => 'Administrators',
                'permission_key' => 'manage-administrator'
            ],
            [
                'parent_id' => 7,
                'title' => 'Listing',
                'permission_key' => 'administrator-listing'
            ],
            [
                'parent_id' => 7,
                'title' => 'Add New Administrator',
                'permission_key' => 'add-administrator'
            ],
            [
                'parent_id' => 7,
                'title' => 'Administrator Details',
                'permission_key' => 'view-administrator'
            ],
            [
                'parent_id' => 7,
                'title' => 'Edit Administrator',
                'permission_key' => 'edit-administrator'
            ],
            [
                'parent_id' => 7,
                'title' => 'Delete Administrator',
                'permission_key' => 'delete-administrator'
            ],
            [
                'parent_id' => 7,
                'title' => 'Change Status',
                'permission_key' => 'change-status'
            ],
            [
                'parent_id' => 0,
                'title' => 'Roles',
                'permission_key' => 'manage-roles'
            ],
            [
                'parent_id' => 14,
                'title' => 'Listing',
                'permission_key' => 'roles-listing'
            ],
            [
                'parent_id' => 14,
                'title' => 'Edit Role',
                'permission_key' => 'edit-role'
            ],
            [
                'parent_id' => 14,
                'title' => 'Role Permissions',
                'permission_key' => 'role-permissions'
            ],
            [
                'parent_id' => 14,
                'title' => 'Add Role',
                'permission_key' => 'add-role'
            ],
            [
                'parent_id' => 14,
                'title' => 'Delete Role',
                'permission_key' => 'delete-role'
            ],
        ];

        foreach ($permission as $key => $value) {
            Permission::create($value);
        }
    }
}
