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
                'key' => "user",
                'lable' => "you have permission for sub account",
                'type' => "number",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => "service",
                'lable' => "you have permission for service",
                'type' => "number",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => "applay",
                'lable' => "you have permission for applay",
                'type' => "number",
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
