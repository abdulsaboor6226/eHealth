<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdminUser = User::create([
           'name' => 'master',
           'email' => 'master@master.com',
           'phone' => '123456789',
           'status_id' => '2',
           'password' => \Illuminate\Support\Facades\Hash::make('secret')
        ]);

        $superAdminUser->assignRole('super_admin');
    }
}
