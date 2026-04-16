<?php
namespace Database\Factories;
use App\Models\BagsCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
class BagsCategoryFactory extends Factory {
    protected $model = BagsCategory::class;
    public function definition(): array {
        return [
            'bag_id' => 1,
            'title' => $this->faker->word,
            'image' => $this->faker->word,
        ];
    }
}