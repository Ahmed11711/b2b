<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class BranchSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('branches')->insert([
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'title' => Str::title('title') . '_' . Str::random(5),
                'address' => 'Sample_' . Str::random(5),
                'mobile' => 'Sample_' . Str::random(5),
                'lat' => 'Sample_' . Str::random(5),
                'lng' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'title' => Str::title('title') . '_' . Str::random(5),
                'address' => 'Sample_' . Str::random(5),
                'mobile' => 'Sample_' . Str::random(5),
                'lat' => 'Sample_' . Str::random(5),
                'lng' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'title' => Str::title('title') . '_' . Str::random(5),
                'address' => 'Sample_' . Str::random(5),
                'mobile' => 'Sample_' . Str::random(5),
                'lat' => 'Sample_' . Str::random(5),
                'lng' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'title' => Str::title('title') . '_' . Str::random(5),
                'address' => 'Sample_' . Str::random(5),
                'mobile' => 'Sample_' . Str::random(5),
                'lat' => 'Sample_' . Str::random(5),
                'lng' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'title' => Str::title('title') . '_' . Str::random(5),
                'address' => 'Sample_' . Str::random(5),
                'mobile' => 'Sample_' . Str::random(5),
                'lat' => 'Sample_' . Str::random(5),
                'lng' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'title' => Str::title('title') . '_' . Str::random(5),
                'address' => 'Sample_' . Str::random(5),
                'mobile' => 'Sample_' . Str::random(5),
                'lat' => 'Sample_' . Str::random(5),
                'lng' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'title' => Str::title('title') . '_' . Str::random(5),
                'address' => 'Sample_' . Str::random(5),
                'mobile' => 'Sample_' . Str::random(5),
                'lat' => 'Sample_' . Str::random(5),
                'lng' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'title' => Str::title('title') . '_' . Str::random(5),
                'address' => 'Sample_' . Str::random(5),
                'mobile' => 'Sample_' . Str::random(5),
                'lat' => 'Sample_' . Str::random(5),
                'lng' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'title' => Str::title('title') . '_' . Str::random(5),
                'address' => 'Sample_' . Str::random(5),
                'mobile' => 'Sample_' . Str::random(5),
                'lat' => 'Sample_' . Str::random(5),
                'lng' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'title' => Str::title('title') . '_' . Str::random(5),
                'address' => 'Sample_' . Str::random(5),
                'mobile' => 'Sample_' . Str::random(5),
                'lat' => 'Sample_' . Str::random(5),
                'lng' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}