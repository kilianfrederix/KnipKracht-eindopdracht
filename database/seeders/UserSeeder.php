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
                'password' => 'susie',
                'username' => 'Susie',
                'is_employee' => 1,
            ],
            [
                'name' => 'Michelle',
                'email' => 'MichelleKnipKracht@gmail.com',
                'password' => 'michelle',
                'username' => 'Michelle',
                'is_employee' => 1,
            ],
            [
                'name' => 'Vicky',
                'email' => 'VickyKnipKracht@gmail.com',
                'password' => 'vicky',
                'username' => 'Vicky',
                'is_employee' => 1,
            ],
            [
                'name' => 'Ocean',
                'email' => 'OceanKnipKracht@gmail.com',
                'password' => 'ocean',
                'username' => 'Ocean',
                'is_employee' => 1,
            ]
        ]);
    }
}
