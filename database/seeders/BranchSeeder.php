<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class BranchSeeder extends Seeder
{
    public function run(): void
    {
        // مصفوفة لإدراج البيانات بشكل أنظف
        $branches = [];

        for ($i = 0; $i < 10; $i++) {
            $branches[] = [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'title' => Str::title('branch') . '_' . Str::random(5),
                'address' => 'Sample Address ' . rand(1, 100),
                'mobile' => '01' . rand(10000000, 99999999),

                'lat' => rand(22, 31) . '.' . rand(100000, 999999),
                'lng' => rand(25, 34) . '.' . rand(100000, 999999),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('branches')->insert($branches);
    }
}
