<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Heathcliff',
            'email' => 'admin@mail.com',
            'password' => Hash::make('artikelmantap'),
            'role' => 'Admin'
        ]);
        $user = factory(App\User::class,5)->create();
    }
}
