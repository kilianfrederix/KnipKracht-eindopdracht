<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Susie',
                'email' => 'SusieKnipKracht@gmail.com',
                'password' => 'test',
                'username' => 'Susie',
                'is_employee' => 1,
            ],
            [
                'name' => 'Michelle',
                'email' => 'MichelleKnipKracht@gmail.com',
                'password' => 'test',
                'username' => 'Michelle',
                'is_employee' => 1,
            ],
            [
                'name' => 'Vicky',
                'email' => 'VickyKnipKracht@gmail.com',
                'password' => 'test',
                'username' => 'Vicky',
                'is_employee' => 1,
            ],
            [
                'name' => 'Ocean',
                'email' => 'OceanKnipKracht@gmail.com',
                'password' => 'test',
                'username' => 'Ocean',
                'is_employee' => 1,
            ]
        ]);
    }
}
