<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'name' => 'Fahmi',
                'username' => 'fhmalba',
                'email' => 'fhmalba@gradien.co',
                'role'  => ['user', 'admin']
            ],
            [
                'name' => 'Alandani',
                'username' => 'alandani',
                'email' => 'alandani@gradien.co',
                'role'  => ['user', 'admin', 'super']
            ],
            [
                'name' => 'Gradien Digital Indonesia',
                'username' => 'gradien.co',
                'email' => 'info@gradien.co',
                'role'  => ['admin', 'super']
            ],
        ])->each(function($attr){
            $user = User::create([
                'name' => $attr['name'],
                'username' => $attr['username'],
                'email' => $attr['email'],
                'password' => bcrypt('password')
            ]);

            $user->assignRole($attr['role']);
        });
    }
}
