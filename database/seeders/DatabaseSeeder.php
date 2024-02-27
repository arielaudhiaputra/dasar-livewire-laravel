<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Lembaga;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678')
        ]);


        Lembaga::insert([
            [
                'nama' => "latiseducation"
            ],
            [
                'nama' => "tutorindonesia"
            ]
        ]);

        Siswa::insert([
            [
                'id_lembaga' => 1,
                'nis' => 0326547,
                'nama' => "Ariel Audhia Putra",
                'email' => "ariel@gmail.com",
                'foto' => null,
            ],
            [
                'id_lembaga' => 1,
                'nis' => 03265327,
                'nama' => "Reksa Prayoga",
                'email' => "reksa@gmail.com",
                'foto' => null,
            ],
            [
                'id_lembaga' => 2,
                'nis' => 0323455247,
                'nama' => "Muhammad Rizal",
                'email' => "rizal@gmail.com",
                'foto' => null,
            ],
            [
                'id_lembaga' => 2,
                'nis' => 0326431547,
                'nama' => "Akbar Maulana",
                'email' => "akbar@gmail.com",
                'foto' => null,
            ],
            [
                'id_lembaga' => 2,
                'nis' => 03234552247,
                'nama' => "Maluana Hasani",
                'email' => "hasani@gmail.com",
                'foto' => null,
            ],
            [
                'id_lembaga' => 1,
                'nis' => 03264431547,
                'nama' => "Kheisa Aurida",
                'email' => "khei@gmail.com",
                'foto' => null,
            ],
            [
                'id_lembaga' => 2,
                'nis' => 0323422155247,
                'nama' => "Muhammad Irfan",
                'email' => "irfan@gmail.com",
                'foto' => null,
            ],
            [
                'id_lembaga' => 2,
                'nis' => 0326434631547,
                'nama' => "Gathan",
                'email' => "gat@gmail.com",
                'foto' => null,
            ],
        ]);
    }
}
