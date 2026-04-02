<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UserInfoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('user_infos')->insert([
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'country_id' => DB::table('countries')->inRandomOrder()->value('id') ?? 1,
                'city_id' => DB::table('cities')->inRandomOrder()->value('id') ?? 1,
                'info' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'country_id' => DB::table('countries')->inRandomOrder()->value('id') ?? 1,
                'city_id' => DB::table('cities')->inRandomOrder()->value('id') ?? 1,
                'info' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'country_id' => DB::table('countries')->inRandomOrder()->value('id') ?? 1,
                'city_id' => DB::table('cities')->inRandomOrder()->value('id') ?? 1,
                'info' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'country_id' => DB::table('countries')->inRandomOrder()->value('id') ?? 1,
                'city_id' => DB::table('cities')->inRandomOrder()->value('id') ?? 1,
                'info' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'country_id' => DB::table('countries')->inRandomOrder()->value('id') ?? 1,
                'city_id' => DB::table('cities')->inRandomOrder()->value('id') ?? 1,
                'info' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'country_id' => DB::table('countries')->inRandomOrder()->value('id') ?? 1,
                'city_id' => DB::table('cities')->inRandomOrder()->value('id') ?? 1,
                'info' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'country_id' => DB::table('countries')->inRandomOrder()->value('id') ?? 1,
                'city_id' => DB::table('cities')->inRandomOrder()->value('id') ?? 1,
                'info' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'country_id' => DB::table('countries')->inRandomOrder()->value('id') ?? 1,
                'city_id' => DB::table('cities')->inRandomOrder()->value('id') ?? 1,
                'info' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'country_id' => DB::table('countries')->inRandomOrder()->value('id') ?? 1,
                'city_id' => DB::table('cities')->inRandomOrder()->value('id') ?? 1,
                'info' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'country_id' => DB::table('countries')->inRandomOrder()->value('id') ?? 1,
                'city_id' => DB::table('cities')->inRandomOrder()->value('id') ?? 1,
                'info' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}