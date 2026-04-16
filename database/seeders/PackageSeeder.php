<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('packages')->insert([
            [
                'name' => Str::title('name') . '_' . Str::random(5),
                'description' => Str::title('description') . '_' . Str::random(5),
                'price' => 'Sample_' . Str::random(5),
                'active' => collect(['active','inactive'])->random(),
                'duration_months' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => Str::title('name') . '_' . Str::random(5),
                'description' => Str::title('description') . '_' . Str::random(5),
                'price' => 'Sample_' . Str::random(5),
                'active' => collect(['active','inactive'])->random(),
                'duration_months' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => Str::title('name') . '_' . Str::random(5),
                'description' => Str::title('description') . '_' . Str::random(5),
                'price' => 'Sample_' . Str::random(5),
                'active' => collect(['active','inactive'])->random(),
                'duration_months' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => Str::title('name') . '_' . Str::random(5),
                'description' => Str::title('description') . '_' . Str::random(5),
                'price' => 'Sample_' . Str::random(5),
                'active' => collect(['active','inactive'])->random(),
                'duration_months' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => Str::title('name') . '_' . Str::random(5),
                'description' => Str::title('description') . '_' . Str::random(5),
                'price' => 'Sample_' . Str::random(5),
                'active' => collect(['active','inactive'])->random(),
                'duration_months' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => Str::title('name') . '_' . Str::random(5),
                'description' => Str::title('description') . '_' . Str::random(5),
                'price' => 'Sample_' . Str::random(5),
                'active' => collect(['active','inactive'])->random(),
                'duration_months' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => Str::title('name') . '_' . Str::random(5),
                'description' => Str::title('description') . '_' . Str::random(5),
                'price' => 'Sample_' . Str::random(5),
                'active' => collect(['active','inactive'])->random(),
                'duration_months' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => Str::title('name') . '_' . Str::random(5),
                'description' => Str::title('description') . '_' . Str::random(5),
                'price' => 'Sample_' . Str::random(5),
                'active' => collect(['active','inactive'])->random(),
                'duration_months' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => Str::title('name') . '_' . Str::random(5),
                'description' => Str::title('description') . '_' . Str::random(5),
                'price' => 'Sample_' . Str::random(5),
                'active' => collect(['active','inactive'])->random(),
                'duration_months' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => Str::title('name') . '_' . Str::random(5),
                'description' => Str::title('description') . '_' . Str::random(5),
                'price' => 'Sample_' . Str::random(5),
                'active' => collect(['active','inactive'])->random(),
                'duration_months' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}