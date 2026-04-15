<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class MyCertificateSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('my_certificates')->insert([
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'title' => Str::title('title') . '_' . Str::random(5),
                'issue_date' => 'Sample_' . Str::random(5),
                'image' => collect(['https://images.unsplash.com/photo-1498050108023-c5249f4df085','https://images.unsplash.com/photo-1461747823400-487cf1852d7e','https://images.unsplash.com/photo-1504639725590-34d0984388bd'])->random(),
                'description' => Str::title('description') . '_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'title' => Str::title('title') . '_' . Str::random(5),
                'issue_date' => 'Sample_' . Str::random(5),
                'image' => collect(['https://images.unsplash.com/photo-1498050108023-c5249f4df085','https://images.unsplash.com/photo-1461747823400-487cf1852d7e','https://images.unsplash.com/photo-1504639725590-34d0984388bd'])->random(),
                'description' => Str::title('description') . '_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'title' => Str::title('title') . '_' . Str::random(5),
                'issue_date' => 'Sample_' . Str::random(5),
                'image' => collect(['https://images.unsplash.com/photo-1498050108023-c5249f4df085','https://images.unsplash.com/photo-1461747823400-487cf1852d7e','https://images.unsplash.com/photo-1504639725590-34d0984388bd'])->random(),
                'description' => Str::title('description') . '_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'title' => Str::title('title') . '_' . Str::random(5),
                'issue_date' => 'Sample_' . Str::random(5),
                'image' => collect(['https://images.unsplash.com/photo-1498050108023-c5249f4df085','https://images.unsplash.com/photo-1461747823400-487cf1852d7e','https://images.unsplash.com/photo-1504639725590-34d0984388bd'])->random(),
                'description' => Str::title('description') . '_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'title' => Str::title('title') . '_' . Str::random(5),
                'issue_date' => 'Sample_' . Str::random(5),
                'image' => collect(['https://images.unsplash.com/photo-1498050108023-c5249f4df085','https://images.unsplash.com/photo-1461747823400-487cf1852d7e','https://images.unsplash.com/photo-1504639725590-34d0984388bd'])->random(),
                'description' => Str::title('description') . '_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'title' => Str::title('title') . '_' . Str::random(5),
                'issue_date' => 'Sample_' . Str::random(5),
                'image' => collect(['https://images.unsplash.com/photo-1498050108023-c5249f4df085','https://images.unsplash.com/photo-1461747823400-487cf1852d7e','https://images.unsplash.com/photo-1504639725590-34d0984388bd'])->random(),
                'description' => Str::title('description') . '_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'title' => Str::title('title') . '_' . Str::random(5),
                'issue_date' => 'Sample_' . Str::random(5),
                'image' => collect(['https://images.unsplash.com/photo-1498050108023-c5249f4df085','https://images.unsplash.com/photo-1461747823400-487cf1852d7e','https://images.unsplash.com/photo-1504639725590-34d0984388bd'])->random(),
                'description' => Str::title('description') . '_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'title' => Str::title('title') . '_' . Str::random(5),
                'issue_date' => 'Sample_' . Str::random(5),
                'image' => collect(['https://images.unsplash.com/photo-1498050108023-c5249f4df085','https://images.unsplash.com/photo-1461747823400-487cf1852d7e','https://images.unsplash.com/photo-1504639725590-34d0984388bd'])->random(),
                'description' => Str::title('description') . '_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'title' => Str::title('title') . '_' . Str::random(5),
                'issue_date' => 'Sample_' . Str::random(5),
                'image' => collect(['https://images.unsplash.com/photo-1498050108023-c5249f4df085','https://images.unsplash.com/photo-1461747823400-487cf1852d7e','https://images.unsplash.com/photo-1504639725590-34d0984388bd'])->random(),
                'description' => Str::title('description') . '_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'title' => Str::title('title') . '_' . Str::random(5),
                'issue_date' => 'Sample_' . Str::random(5),
                'image' => collect(['https://images.unsplash.com/photo-1498050108023-c5249f4df085','https://images.unsplash.com/photo-1461747823400-487cf1852d7e','https://images.unsplash.com/photo-1504639725590-34d0984388bd'])->random(),
                'description' => Str::title('description') . '_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}