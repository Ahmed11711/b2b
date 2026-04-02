<?php
namespace Database\Factories;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;
class ServiceFactory extends Factory {
    protected $model = Service::class;
    public function definition(): array {
        return [
            'user_id' => 1,
            'category_id' => 1,
            'city_id' => 1,
            'title' => $this->faker->word,
            'desc' => $this->faker->word,
            'image' => $this->faker->word,
            'price' => $this->faker->word,
        ];
    }
}