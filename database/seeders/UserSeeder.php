<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => Str::title('name') . '_' . Str::random(5),
                'email' => 'user_' . Str::lower(Str::random(8)) . '_0@example.com',
                'phone' => '01' . rand(100, 999) . rand(1000, 9999) . 0,
                'role' => collect(['user','provider','admiin','super_admin'])->random(),
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'remember_token' => Str::title('remember_token') . '_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => Str::title('name') . '_' . Str::random(5),
                'email' => 'user_' . Str::lower(Str::random(8)) . '_1@example.com',
                'phone' => '01' . rand(100, 999) . rand(1000, 9999) . 1,
                'role' => collect(['user','provider','admiin','super_admin'])->random(),
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'remember_token' => Str::title('remember_token') . '_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => Str::title('name') . '_' . Str::random(5),
                'email' => 'user_' . Str::lower(Str::random(8)) . '_2@example.com',
                'phone' => '01' . rand(100, 999) . rand(1000, 9999) . 2,
                'role' => collect(['user','provider','admiin','super_admin'])->random(),
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'remember_token' => Str::title('remember_token') . '_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => Str::title('name') . '_' . Str::random(5),
                'email' => 'user_' . Str::lower(Str::random(8)) . '_3@example.com',
                'phone' => '01' . rand(100, 999) . rand(1000, 9999) . 3,
                'role' => collect(['user','provider','admiin','super_admin'])->random(),
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'remember_token' => Str::title('remember_token') . '_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => Str::title('name') . '_' . Str::random(5),
                'email' => 'user_' . Str::lower(Str::random(8)) . '_4@example.com',
                'phone' => '01' . rand(100, 999) . rand(1000, 9999) . 4,
                'role' => collect(['user','provider','admiin','super_admin'])->random(),
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'remember_token' => Str::title('remember_token') . '_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => Str::title('name') . '_' . Str::random(5),
                'email' => 'user_' . Str::lower(Str::random(8)) . '_5@example.com',
                'phone' => '01' . rand(100, 999) . rand(1000, 9999) . 5,
                'role' => collect(['user','provider','admiin','super_admin'])->random(),
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'remember_token' => Str::title('remember_token') . '_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => Str::title('name') . '_' . Str::random(5),
                'email' => 'user_' . Str::lower(Str::random(8)) . '_6@example.com',
                'phone' => '01' . rand(100, 999) . rand(1000, 9999) . 6,
                'role' => collect(['user','provider','admiin','super_admin'])->random(),
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'remember_token' => Str::title('remember_token') . '_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => Str::title('name') . '_' . Str::random(5),
                'email' => 'user_' . Str::lower(Str::random(8)) . '_7@example.com',
                'phone' => '01' . rand(100, 999) . rand(1000, 9999) . 7,
                'role' => collect(['user','provider','admiin','super_admin'])->random(),
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'remember_token' => Str::title('remember_token') . '_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => Str::title('name') . '_' . Str::random(5),
                'email' => 'user_' . Str::lower(Str::random(8)) . '_8@example.com',
                'phone' => '01' . rand(100, 999) . rand(1000, 9999) . 8,
                'role' => collect(['user','provider','admiin','super_admin'])->random(),
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'remember_token' => Str::title('remember_token') . '_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => Str::title('name') . '_' . Str::random(5),
                'email' => 'user_' . Str::lower(Str::random(8)) . '_9@example.com',
                'phone' => '01' . rand(100, 999) . rand(1000, 9999) . 9,
                'role' => collect(['user','provider','admiin','super_admin'])->random(),
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'remember_token' => Str::title('remember_token') . '_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}