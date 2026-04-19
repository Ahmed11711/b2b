<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        $packages = [];
        // مصفوفة بأسماء باقات واقعية شوية
        $types = ['Basic', 'Premium', 'Gold', 'VIP', 'Business'];

        for ($i = 0; $i < 10; $i++) {
            $packages[] = [
                'name' => $types[array_rand($types)] . ' Package ' . Str::random(3),
                'description' => 'Perfect description for a great package ' . ($i + 1),
                'price' => rand(100, 2000), // رقم صحيح للسعر
                'active' => collect(['active', 'inactive'])->random(),
                'duration_months' => collect([1, 3, 6, 12])->random(), // شهور حقيقية
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('packages')->insert($packages);
    }
}
