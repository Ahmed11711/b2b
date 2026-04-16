<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class FeatureSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('features')->insert([
            [
                'key' => 'Sample_' . Str::random(5),
                'lable' => 'Sample_' . Str::random(5),
                'type' => collect(['boolean','number','text'])->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'Sample_' . Str::random(5),
                'lable' => 'Sample_' . Str::random(5),
                'type' => collect(['boolean','number','text'])->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'Sample_' . Str::random(5),
                'lable' => 'Sample_' . Str::random(5),
                'type' => collect(['boolean','number','text'])->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'Sample_' . Str::random(5),
                'lable' => 'Sample_' . Str::random(5),
                'type' => collect(['boolean','number','text'])->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'Sample_' . Str::random(5),
                'lable' => 'Sample_' . Str::random(5),
                'type' => collect(['boolean','number','text'])->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'Sample_' . Str::random(5),
                'lable' => 'Sample_' . Str::random(5),
                'type' => collect(['boolean','number','text'])->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'Sample_' . Str::random(5),
                'lable' => 'Sample_' . Str::random(5),
                'type' => collect(['boolean','number','text'])->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'Sample_' . Str::random(5),
                'lable' => 'Sample_' . Str::random(5),
                'type' => collect(['boolean','number','text'])->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'Sample_' . Str::random(5),
                'lable' => 'Sample_' . Str::random(5),
                'type' => collect(['boolean','number','text'])->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'Sample_' . Str::random(5),
                'lable' => 'Sample_' . Str::random(5),
                'type' => collect(['boolean','number','text'])->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}