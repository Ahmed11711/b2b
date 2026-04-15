<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PostsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('posts')->insert([
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'title' => Str::title('title') . '_' . Str::random(5),
                'description' => Str::title('description') . '_' . Str::random(5),
                'price_from' => 'Sample_' . Str::random(5),
                'price_to' => 'Sample_' . Str::random(5),
                'image' => collect(['https://images.unsplash.com/photo-1498050108023-c5249f4df085','https://images.unsplash.com/photo-1461747823400-487cf1852d7e','https://images.unsplash.com/photo-1504639725590-34d0984388bd'])->random(),
                'is_active' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'title' => Str::title('title') . '_' . Str::random(5),
                'description' => Str::title('description') . '_' . Str::random(5),
                'price_from' => 'Sample_' . Str::random(5),
                'price_to' => 'Sample_' . Str::random(5),
                'image' => collect(['https://images.unsplash.com/photo-1498050108023-c5249f4df085','https://images.unsplash.com/photo-1461747823400-487cf1852d7e','https://images.unsplash.com/photo-1504639725590-34d0984388bd'])->random(),
                'is_active' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'title' => Str::title('title') . '_' . Str::random(5),
                'description' => Str::title('description') . '_' . Str::random(5),
                'price_from' => 'Sample_' . Str::random(5),
                'price_to' => 'Sample_' . Str::random(5),
                'image' => collect(['https://images.unsplash.com/photo-1498050108023-c5249f4df085','https://images.unsplash.com/photo-1461747823400-487cf1852d7e','https://images.unsplash.com/photo-1504639725590-34d0984388bd'])->random(),
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'title' => Str::title('title') . '_' . Str::random(5),
                'description' => Str::title('description') . '_' . Str::random(5),
                'price_from' => 'Sample_' . Str::random(5),
                'price_to' => 'Sample_' . Str::random(5),
                'image' => collect(['https://images.unsplash.com/photo-1498050108023-c5249f4df085','https://images.unsplash.com/photo-1461747823400-487cf1852d7e','https://images.unsplash.com/photo-1504639725590-34d0984388bd'])->random(),
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'title' => Str::title('title') . '_' . Str::random(5),
                'description' => Str::title('description') . '_' . Str::random(5),
                'price_from' => 'Sample_' . Str::random(5),
                'price_to' => 'Sample_' . Str::random(5),
                'image' => collect(['https://images.unsplash.com/photo-1498050108023-c5249f4df085','https://images.unsplash.com/photo-1461747823400-487cf1852d7e','https://images.unsplash.com/photo-1504639725590-34d0984388bd'])->random(),
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'title' => Str::title('title') . '_' . Str::random(5),
                'description' => Str::title('description') . '_' . Str::random(5),
                'price_from' => 'Sample_' . Str::random(5),
                'price_to' => 'Sample_' . Str::random(5),
                'image' => collect(['https://images.unsplash.com/photo-1498050108023-c5249f4df085','https://images.unsplash.com/photo-1461747823400-487cf1852d7e','https://images.unsplash.com/photo-1504639725590-34d0984388bd'])->random(),
                'is_active' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'title' => Str::title('title') . '_' . Str::random(5),
                'description' => Str::title('description') . '_' . Str::random(5),
                'price_from' => 'Sample_' . Str::random(5),
                'price_to' => 'Sample_' . Str::random(5),
                'image' => collect(['https://images.unsplash.com/photo-1498050108023-c5249f4df085','https://images.unsplash.com/photo-1461747823400-487cf1852d7e','https://images.unsplash.com/photo-1504639725590-34d0984388bd'])->random(),
                'is_active' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'title' => Str::title('title') . '_' . Str::random(5),
                'description' => Str::title('description') . '_' . Str::random(5),
                'price_from' => 'Sample_' . Str::random(5),
                'price_to' => 'Sample_' . Str::random(5),
                'image' => collect(['https://images.unsplash.com/photo-1498050108023-c5249f4df085','https://images.unsplash.com/photo-1461747823400-487cf1852d7e','https://images.unsplash.com/photo-1504639725590-34d0984388bd'])->random(),
                'is_active' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'title' => Str::title('title') . '_' . Str::random(5),
                'description' => Str::title('description') . '_' . Str::random(5),
                'price_from' => 'Sample_' . Str::random(5),
                'price_to' => 'Sample_' . Str::random(5),
                'image' => collect(['https://images.unsplash.com/photo-1498050108023-c5249f4df085','https://images.unsplash.com/photo-1461747823400-487cf1852d7e','https://images.unsplash.com/photo-1504639725590-34d0984388bd'])->random(),
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'title' => Str::title('title') . '_' . Str::random(5),
                'description' => Str::title('description') . '_' . Str::random(5),
                'price_from' => 'Sample_' . Str::random(5),
                'price_to' => 'Sample_' . Str::random(5),
                'image' => collect(['https://images.unsplash.com/photo-1498050108023-c5249f4df085','https://images.unsplash.com/photo-1461747823400-487cf1852d7e','https://images.unsplash.com/photo-1504639725590-34d0984388bd'])->random(),
                'is_active' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}