<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Camilo Cunha de Azevedo',
            'email' => 'camilotk@gmail.com',
            'password' => bcrypt('minhasenha123'),
            'created_at' => Carbon::now()
        ]);
    }
}
