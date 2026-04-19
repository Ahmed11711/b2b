<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class BagItemsSeeder extends Seeder
{
    public function run(): void
    {
        $items = [];
        $images = [
            'https://images.unsplash.com/photo-1498050108023-c5249f4df085',
            'https://images.unsplash.com/photo-1461747823400-487cf1852d7e',
            'https://images.unsplash.com/photo-1504639725590-34d0984388bd'
        ];

        for ($i = 0; $i < 10; $i++) {
            $items[] = [
                'title' => 'Product ' . Str::random(5),
                'price' => rand(50, 500) + (rand(0, 99) / 100), // يولد رقم عشري مثل 150.75
                'image' => collect($images)->random(),
                'currency' => collect(['ريال', 'دولار', 'جنيه مصري'])->random(),
                'rating' => rand(1, 5), // تقييم رقمي من 1 لـ 5
                'desc' => 'Detailed description for item ' . ($i + 1),
                'Whose' => 'Brand_' . Str::random(5),
                'what_will_you_get' => 'Full access to ' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('bag_items')->insert($items);
    }
}
