<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('services')->insert([
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'category_id' => DB::table('categories')->inRandomOrder()->value('id') ?? 1,
                'city_id' => DB::table('cities')->inRandomOrder()->value('id') ?? 1,
                'title' => Str::title('title') . '_' . Str::random(5),
                'desc' => Str::title('desc') . '_' . Str::random(5),
                'image' => collect(['https://images.unsplash.com/photo-1498050108023-c5249f4df085', 'https://images.unsplash.com/photo-1461747823400-487cf1852d7e', 'https://images.unsplash.com/photo-1504639725590-34d0984388bd'])->random(),
                'price' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'category_id' => DB::table('categories')->inRandomOrder()->value('id') ?? 1,
                'city_id' => DB::table('cities')->inRandomOrder()->value('id') ?? 1,
                'title' => Str::title('title') . '_' . Str::random(5),
                'desc' => Str::title('desc') . '_' . Str::random(5),
                'image' => collect(['https://images.unsplash.com/photo-1498050108023-c5249f4df085', 'https://images.unsplash.com/photo-1461747823400-487cf1852d7e', 'https://images.unsplash.com/photo-1504639725590-34d0984388bd'])->random(),
                'price' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'category_id' => DB::table('categories')->inRandomOrder()->value('id') ?? 1,
                'city_id' => DB::table('cities')->inRandomOrder()->value('id') ?? 1,
                'title' => Str::title('title') . '_' . Str::random(5),
                'desc' => Str::title('desc') . '_' . Str::random(5),
                'image' => collect(['https://images.unsplash.com/photo-1498050108023-c5249f4df085', 'https://images.unsplash.com/photo-1461747823400-487cf1852d7e', 'https://images.unsplash.com/photo-1504639725590-34d0984388bd'])->random(),
                'price' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'category_id' => DB::table('categories')->inRandomOrder()->value('id') ?? 1,
                'city_id' => DB::table('cities')->inRandomOrder()->value('id') ?? 1,
                'title' => Str::title('title') . '_' . Str::random(5),
                'desc' => Str::title('desc') . '_' . Str::random(5),
                'image' => collect(['https://images.unsplash.com/photo-1498050108023-c5249f4df085', 'https://images.unsplash.com/photo-1461747823400-487cf1852d7e', 'https://images.unsplash.com/photo-1504639725590-34d0984388bd'])->random(),
                'price' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'category_id' => DB::table('categories')->inRandomOrder()->value('id') ?? 1,
                'city_id' => DB::table('cities')->inRandomOrder()->value('id') ?? 1,
                'title' => Str::title('title') . '_' . Str::random(5),
                'desc' => Str::title('desc') . '_' . Str::random(5),
                'image' => collect(['https://images.unsplash.com/photo-1498050108023-c5249f4df085', 'https://images.unsplash.com/photo-1461747823400-487cf1852d7e', 'https://images.unsplash.com/photo-1504639725590-34d0984388bd'])->random(),
                'price' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'category_id' => DB::table('categories')->inRandomOrder()->value('id') ?? 1,
                'city_id' => DB::table('cities')->inRandomOrder()->value('id') ?? 1,
                'title' => Str::title('title') . '_' . Str::random(5),
                'desc' => Str::title('desc') . '_' . Str::random(5),
                'image' => collect(['https://images.unsplash.com/photo-1498050108023-c5249f4df085', 'https://images.unsplash.com/photo-1461747823400-487cf1852d7e', 'https://images.unsplash.com/photo-1504639725590-34d0984388bd'])->random(),
                'price' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'category_id' => DB::table('categories')->inRandomOrder()->value('id') ?? 1,
                'city_id' => DB::table('cities')->inRandomOrder()->value('id') ?? 1,
                'title' => Str::title('title') . '_' . Str::random(5),
                'desc' => Str::title('desc') . '_' . Str::random(5),
                'image' => collect(['https://images.unsplash.com/photo-1498050108023-c5249f4df085', 'https://images.unsplash.com/photo-1461747823400-487cf1852d7e', 'https://images.unsplash.com/photo-1504639725590-34d0984388bd'])->random(),
                'price' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'category_id' => DB::table('categories')->inRandomOrder()->value('id') ?? 1,
                'city_id' => DB::table('cities')->inRandomOrder()->value('id') ?? 1,
                'title' => Str::title('title') . '_' . Str::random(5),
                'desc' => Str::title('desc') . '_' . Str::random(5),
                'image' => collect(['https://images.unsplash.com/photo-1498050108023-c5249f4df085', 'https://images.unsplash.com/photo-1461747823400-487cf1852d7e', 'https://images.unsplash.com/photo-1504639725590-34d0984388bd'])->random(),
                'price' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'category_id' => DB::table('categories')->inRandomOrder()->value('id') ?? 1,
                'city_id' => DB::table('cities')->inRandomOrder()->value('id') ?? 1,
                'title' => Str::title('title') . '_' . Str::random(5),
                'desc' => Str::title('desc') . '_' . Str::random(5),
                'image' => collect(['https://images.unsplash.com/photo-1498050108023-c5249f4df085', 'https://images.unsplash.com/photo-1461747823400-487cf1852d7e', 'https://images.unsplash.com/photo-1504639725590-34d0984388bd'])->random(),
                'price' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'category_id' => DB::table('categories')->inRandomOrder()->value('id') ?? 1,
                'city_id' => DB::table('cities')->inRandomOrder()->value('id') ?? 1,
                'title' => Str::title('title') . '_' . Str::random(5),
                'desc' => Str::title('desc') . '_' . Str::random(5),
                'image' => collect(['https://images.unsplash.com/photo-1498050108023-c5249f4df085', 'https://images.unsplash.com/photo-1461747823400-487cf1852d7e', 'https://images.unsplash.com/photo-1504639725590-34d0984388bd'])->random(),
                'price' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
