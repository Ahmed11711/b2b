<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('cities')->insert([
            [
                'country_id' => DB::table('countries')->inRandomOrder()->value('id') ?? 1,
                'name_ar' => 'name  مطور ' . Str::random(3),
                'name_en' => Str::title('name_en') . '_' . Str::random(5),
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'country_id' => DB::table('countries')->inRandomOrder()->value('id') ?? 1,
                'name_ar' => 'name  مطور ' . Str::random(3),
                'name_en' => Str::title('name_en') . '_' . Str::random(5),
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'country_id' => DB::table('countries')->inRandomOrder()->value('id') ?? 1,
                'name_ar' => 'name  مطور ' . Str::random(3),
                'name_en' => Str::title('name_en') . '_' . Str::random(5),
                'is_active' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'country_id' => DB::table('countries')->inRandomOrder()->value('id') ?? 1,
                'name_ar' => 'name  افتراضي ' . Str::random(3),
                'name_en' => Str::title('name_en') . '_' . Str::random(5),
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'country_id' => DB::table('countries')->inRandomOrder()->value('id') ?? 1,
                'name_ar' => 'name  افتراضي ' . Str::random(3),
                'name_en' => Str::title('name_en') . '_' . Str::random(5),
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'country_id' => DB::table('countries')->inRandomOrder()->value('id') ?? 1,
                'name_ar' => 'name  مطور ' . Str::random(3),
                'name_en' => Str::title('name_en') . '_' . Str::random(5),
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'country_id' => DB::table('countries')->inRandomOrder()->value('id') ?? 1,
                'name_ar' => 'name  مطور ' . Str::random(3),
                'name_en' => Str::title('name_en') . '_' . Str::random(5),
                'is_active' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'country_id' => DB::table('countries')->inRandomOrder()->value('id') ?? 1,
                'name_ar' => 'name  مميز ' . Str::random(3),
                'name_en' => Str::title('name_en') . '_' . Str::random(5),
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'country_id' => DB::table('countries')->inRandomOrder()->value('id') ?? 1,
                'name_ar' => 'name  جديد ' . Str::random(3),
                'name_en' => Str::title('name_en') . '_' . Str::random(5),
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'country_id' => DB::table('countries')->inRandomOrder()->value('id') ?? 1,
                'name_ar' => 'name  افتراضي ' . Str::random(3),
                'name_en' => Str::title('name_en') . '_' . Str::random(5),
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}