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
                'password' => '$2y$12$whFenjIEJbXyWlMQNZwFtOeOnCbfLQMnaS1arMaQKgRfG8vE88xwu',
                'username' => 'Susie',
                'is_employee' => 1,
            ],
            [
                'name' => 'Michelle',
                'email' => 'MichelleKnipKracht@gmail.com',
                'password' => '$2y$12$BS6v4WoeU3lsBp/9ssta6.LR/n6JEFBFUPY88mP23jZFA/./sKyLe',
                'username' => 'Michelle',
                'is_employee' => 1,
            ],
            [
                'name' => 'Vicky',
                'email' => 'VickyKnipKracht@gmail.com',
                'password' => '$2y$12$.1fS0A.Gg4s8DxEb31fr9uGLa7YtzQFjymzsk1JnfOHm3Q5mh5y7C',
                'username' => 'Vicky',
                'is_employee' => 1,
            ],
            [
                'name' => 'Ocean',
                'email' => 'OceanKnipKracht@gmail.com',
                'password' => '$2y$12$DRU2Aj9RljsQZb..9ZCXV.6SmqENHwZ0ZZQfcX9kXagzcoz8l/OJa',
                'username' => 'Ocean',
                'is_employee' => 1,
            ]
        ]);
    }
}
