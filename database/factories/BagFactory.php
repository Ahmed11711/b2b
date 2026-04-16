<?php
namespace Database\Factories;
use App\Models\Bag;
use Illuminate\Database\Eloquent\Factories\Factory;
class BagFactory extends Factory {
    protected $model = Bag::class;
    public function definition(): array {
        return [
            'title' => $this->faker->word,
            'image' => $this->faker->word,
            'icon' => $this->faker->word,
            'free' => $this->faker->word,
        ];
    }
}