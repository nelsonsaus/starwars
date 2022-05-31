<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create([
            'nombre'=>'Admin',
            'correo'=>'eladmin@gmail.com',
            'imagen'=>null,
            'pass'=>'prueba',
            'perfil'=>1
            ]
        );
    }
}
