<?php

use Illuminate\Database\Seeder;
use App\Admin;
class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'ulaskode@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
