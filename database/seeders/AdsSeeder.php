<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class AdsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('ads')->insert([
            [
                'category_id' => DB::table('categories')->inRandomOrder()->value('id') ?? 1,
                'status' => collect(['pending','confirmed','canceled','expired'])->random(),
                'title' => Str::title('title') . '_' . Str::random(5),
                'description' => Str::title('description') . '_' . Str::random(5),
                'image' => collect(['https://images.unsplash.com/photo-1498050108023-c5249f4df085','https://images.unsplash.com/photo-1461747823400-487cf1852d7e','https://images.unsplash.com/photo-1504639725590-34d0984388bd'])->random(),
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => DB::table('categories')->inRandomOrder()->value('id') ?? 1,
                'status' => collect(['pending','confirmed','canceled','expired'])->random(),
                'title' => Str::title('title') . '_' . Str::random(5),
                'description' => Str::title('description') . '_' . Str::random(5),
                'image' => collect(['https://images.unsplash.com/photo-1498050108023-c5249f4df085','https://images.unsplash.com/photo-1461747823400-487cf1852d7e','https://images.unsplash.com/photo-1504639725590-34d0984388bd'])->random(),
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => DB::table('categories')->inRandomOrder()->value('id') ?? 1,
                'status' => collect(['pending','confirmed','canceled','expired'])->random(),
                'title' => Str::title('title') . '_' . Str::random(5),
                'description' => Str::title('description') . '_' . Str::random(5),
                'image' => collect(['https://images.unsplash.com/photo-1498050108023-c5249f4df085','https://images.unsplash.com/photo-1461747823400-487cf1852d7e','https://images.unsplash.com/photo-1504639725590-34d0984388bd'])->random(),
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => DB::table('categories')->inRandomOrder()->value('id') ?? 1,
                'status' => collect(['pending','confirmed','canceled','expired'])->random(),
                'title' => Str::title('title') . '_' . Str::random(5),
                'description' => Str::title('description') . '_' . Str::random(5),
                'image' => collect(['https://images.unsplash.com/photo-1498050108023-c5249f4df085','https://images.unsplash.com/photo-1461747823400-487cf1852d7e','https://images.unsplash.com/photo-1504639725590-34d0984388bd'])->random(),
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => DB::table('categories')->inRandomOrder()->value('id') ?? 1,
                'status' => collect(['pending','confirmed','canceled','expired'])->random(),
                'title' => Str::title('title') . '_' . Str::random(5),
                'description' => Str::title('description') . '_' . Str::random(5),
                'image' => collect(['https://images.unsplash.com/photo-1498050108023-c5249f4df085','https://images.unsplash.com/photo-1461747823400-487cf1852d7e','https://images.unsplash.com/photo-1504639725590-34d0984388bd'])->random(),
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => DB::table('categories')->inRandomOrder()->value('id') ?? 1,
                'status' => collect(['pending','confirmed','canceled','expired'])->random(),
                'title' => Str::title('title') . '_' . Str::random(5),
                'description' => Str::title('description') . '_' . Str::random(5),
                'image' => collect(['https://images.unsplash.com/photo-1498050108023-c5249f4df085','https://images.unsplash.com/photo-1461747823400-487cf1852d7e','https://images.unsplash.com/photo-1504639725590-34d0984388bd'])->random(),
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => DB::table('categories')->inRandomOrder()->value('id') ?? 1,
                'status' => collect(['pending','confirmed','canceled','expired'])->random(),
                'title' => Str::title('title') . '_' . Str::random(5),
                'description' => Str::title('description') . '_' . Str::random(5),
                'image' => collect(['https://images.unsplash.com/photo-1498050108023-c5249f4df085','https://images.unsplash.com/photo-1461747823400-487cf1852d7e','https://images.unsplash.com/photo-1504639725590-34d0984388bd'])->random(),
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => DB::table('categories')->inRandomOrder()->value('id') ?? 1,
                'status' => collect(['pending','confirmed','canceled','expired'])->random(),
                'title' => Str::title('title') . '_' . Str::random(5),
                'description' => Str::title('description') . '_' . Str::random(5),
                'image' => collect(['https://images.unsplash.com/photo-1498050108023-c5249f4df085','https://images.unsplash.com/photo-1461747823400-487cf1852d7e','https://images.unsplash.com/photo-1504639725590-34d0984388bd'])->random(),
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => DB::table('categories')->inRandomOrder()->value('id') ?? 1,
                'status' => collect(['pending','confirmed','canceled','expired'])->random(),
                'title' => Str::title('title') . '_' . Str::random(5),
                'description' => Str::title('description') . '_' . Str::random(5),
                'image' => collect(['https://images.unsplash.com/photo-1498050108023-c5249f4df085','https://images.unsplash.com/photo-1461747823400-487cf1852d7e','https://images.unsplash.com/photo-1504639725590-34d0984388bd'])->random(),
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => DB::table('categories')->inRandomOrder()->value('id') ?? 1,
                'status' => collect(['pending','confirmed','canceled','expired'])->random(),
                'title' => Str::title('title') . '_' . Str::random(5),
                'description' => Str::title('description') . '_' . Str::random(5),
                'image' => collect(['https://images.unsplash.com/photo-1498050108023-c5249f4df085','https://images.unsplash.com/photo-1461747823400-487cf1852d7e','https://images.unsplash.com/photo-1504639725590-34d0984388bd'])->random(),
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}