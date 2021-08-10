<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'bahdcoder@gmail.com')->first();

        if(!$user){
          User::create([
            'role' => 'admin',
            'name' => 'Rajeev Bohara',
            'email' => 'bahdcoder@gmail.com',
            'password' => Hash::make('password')
          ]);
        }
    }
}
