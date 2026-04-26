<?php
namespace Database\Factories;
use App\Models\Ads;
use Illuminate\Database\Eloquent\Factories\Factory;
class AdsFactory extends Factory {
    protected $model = Ads::class;
    public function definition(): array {
        return [
            'category_id' => 1,
            'status' => $this->faker->word,
            'title' => $this->faker->word,
            'description' => $this->faker->word,
            'image' => $this->faker->word,
            'is_active' => $this->faker->word,
        ];
    }
}