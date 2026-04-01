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
                'country_id' => DB::table('countries')->inRandomOrder()->value('id') ?? 1,
                'city_id' => DB::table('cities')->inRandomOrder()->value('id') ?? 1,
                'info' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'country_id' => DB::table('countries')->inRandomOrder()->value('id') ?? 1,
                'city_id' => DB::table('cities')->inRandomOrder()->value('id') ?? 1,
                'info' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'country_id' => DB::table('countries')->inRandomOrder()->value('id') ?? 1,
                'city_id' => DB::table('cities')->inRandomOrder()->value('id') ?? 1,
                'info' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'country_id' => DB::table('countries')->inRandomOrder()->value('id') ?? 1,
                'city_id' => DB::table('cities')->inRandomOrder()->value('id') ?? 1,
                'info' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'country_id' => DB::table('countries')->inRandomOrder()->value('id') ?? 1,
                'city_id' => DB::table('cities')->inRandomOrder()->value('id') ?? 1,
                'info' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'country_id' => DB::table('countries')->inRandomOrder()->value('id') ?? 1,
                'city_id' => DB::table('cities')->inRandomOrder()->value('id') ?? 1,
                'info' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'country_id' => DB::table('countries')->inRandomOrder()->value('id') ?? 1,
                'city_id' => DB::table('cities')->inRandomOrder()->value('id') ?? 1,
                'info' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'country_id' => DB::table('countries')->inRandomOrder()->value('id') ?? 1,
                'city_id' => DB::table('cities')->inRandomOrder()->value('id') ?? 1,
                'info' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'country_id' => DB::table('countries')->inRandomOrder()->value('id') ?? 1,
                'city_id' => DB::table('cities')->inRandomOrder()->value('id') ?? 1,
                'info' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'country_id' => DB::table('countries')->inRandomOrder()->value('id') ?? 1,
                'city_id' => DB::table('cities')->inRandomOrder()->value('id') ?? 1,
                'info' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}