<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'José Fernando Pérez García',
            'email' => 'josefernandoperezgarcia98@gmail.com',
            'estado' => 'Si',
            'rol' => 'Administrador',
            'password' => bcrypt('123'),
        ]);
    }
}
