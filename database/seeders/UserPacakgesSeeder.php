<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UserPacakgesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('user_pacakges')->insert([
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'package_id' => DB::table('packages')->where('active', 1)->inRandomOrder()->value('id') ?? 1,
                'starts_at' => now(),
                'ends_at' => now(),
                'active' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'package_id' => DB::table('packages')->where('active', 1)->inRandomOrder()->value('id') ?? 1,
                'starts_at' => now(),
                'ends_at' => now(),
                'active' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'package_id' => DB::table('packages')->where('active', 1)->inRandomOrder()->value('id') ?? 1,
                'starts_at' => now(),
                'ends_at' => now(),
                'active' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'package_id' => DB::table('packages')->where('active', 1)->inRandomOrder()->value('id') ?? 1,
                'starts_at' => now(),
                'ends_at' => now(),
                'active' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'package_id' => DB::table('packages')->where('active', 1)->inRandomOrder()->value('id') ?? 1,
                'starts_at' => now(),
                'ends_at' => now(),
                'active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'package_id' => DB::table('packages')->where('active', 1)->inRandomOrder()->value('id') ?? 1,
                'starts_at' => now(),
                'ends_at' => now(),
                'active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'package_id' => DB::table('packages')->where('active', 1)->inRandomOrder()->value('id') ?? 1,
                'starts_at' => now(),
                'ends_at' => now(),
                'active' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'package_id' => DB::table('packages')->where('active', 1)->inRandomOrder()->value('id') ?? 1,
                'starts_at' => now(),
                'ends_at' => now(),
                'active' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'package_id' => DB::table('packages')->where('active', 1)->inRandomOrder()->value('id') ?? 1,
                'starts_at' => now(),
                'ends_at' => now(),
                'active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'package_id' => DB::table('packages')->where('active', 1)->inRandomOrder()->value('id') ?? 1,
                'starts_at' => now(),
                'ends_at' => now(),
                'active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}