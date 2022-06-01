<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'nombre'=>'Admin',
            'correo'=>'eladmin@gmail.com',
            'imagen'=>null,
            'password'=>Hash::make('prueba'),
            'perfil'=>1
            ]
        );
    }
}
