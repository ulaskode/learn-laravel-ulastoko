<?php

use Illuminate\Database\Seeder;
use App\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ulas Kode',
            'email' => 'ulaskode@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
        ]);
    }
}
