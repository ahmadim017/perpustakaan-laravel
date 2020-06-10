<?php

use Illuminate\Database\Seeder;
use App\User;
class AdminUserseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Ahmad Muhrani',
            'email' => 'ahmadmuhrani89@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        $user->assignRole('admin');
    }
}
