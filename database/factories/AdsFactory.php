<?php
namespace Database\Factories;
use App\Models\Ads;
use Illuminate\Database\Eloquent\Factories\Factory;
class AdsFactory extends Factory {
    protected $model = Ads::class;
    public function definition(): array {
        return [
            'title' => $this->faker->word,
            'title_ar' => $this->faker->word,
            'image' => $this->faker->word,
        ];
    }
}