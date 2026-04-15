<?php
namespace Database\Factories;
use App\Models\Posts;
use Illuminate\Database\Eloquent\Factories\Factory;
class PostsFactory extends Factory {
    protected $model = Posts::class;
    public function definition(): array {
        return [
            'user_id' => 1,
            'title' => $this->faker->word,
            'description' => $this->faker->word,
            'price_from' => $this->faker->word,
            'price_to' => $this->faker->word,
            'image' => $this->faker->word,
            'is_active' => $this->faker->word,
        ];
    }
}