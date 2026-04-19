<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PostsSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [];
        $images = [
            'https://images.unsplash.com/photo-1498050108023-c5249f4df085',
            'https://images.unsplash.com/photo-1461747823400-487cf1852d7e',
            'https://images.unsplash.com/photo-1504639725590-34d0984388bd'
        ];

        for ($i = 0; $i < 10; $i++) {
            // توليد سعر عشوائي بسيط
            $from = rand(100, 500);
            $to = $from + rand(50, 200);

            $posts[] = [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'category_id' => 1,
                'title' => 'Post Title ' . Str::random(5),
                'description' => 'This is a sample description for the post numbered ' . ($i + 1),
                'price_from' => $from, // رقم وليس نص
                'price_to' => $to,     // رقم وليس نص
                'image' => collect($images)->random(),
                'is_active' => rand(0, 1), // تنويع بين النشط وغير النشط
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('posts')->insert($posts);
    }
}
