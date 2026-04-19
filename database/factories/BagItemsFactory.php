<?php
namespace Database\Factories;
use App\Models\BagItems;
use Illuminate\Database\Eloquent\Factories\Factory;
class BagItemsFactory extends Factory {
    protected $model = BagItems::class;
    public function definition(): array {
        return [
            'title' => $this->faker->word,
            'price' => $this->faker->word,
            'image' => $this->faker->word,
            'currency' => $this->faker->word,
            'rating' => $this->faker->word,
            'desc' => $this->faker->word,
            'Whose' => $this->faker->word,
            'what_will_you_get' => $this->faker->word,
        ];
    }
}