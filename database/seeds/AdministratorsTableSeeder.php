<?php

use Multidots\Admin\Model\Administrator;
use Illuminate\Database\Seeder;

class AdministratorsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Administrator::truncate();
        $administrator = [
            [
                'role_id' => 1,
                'first_name' => 'Vikas',
                'last_name' => 'Solanki',
                'username' => 'Admin123',
                'email' => 'vikashsolanki@multidots.com',
                'password' => 'Admin123',
                'last_login' => date('Y-m-d H:i:s')
            ]
        ];

        foreach ($administrator as $key => $value) {
            Administrator::create($value);
        }
    }
}
