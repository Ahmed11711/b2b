<?php
namespace Database\Factories;
use App\Models\blogs;
use Illuminate\Database\Eloquent\Factories\Factory;
class blogsFactory extends Factory {
    protected $model = blogs::class;
    public function definition(): array {
        return [
            'title' => $this->faker->word,
            'title_ar' => $this->faker->word,
            'desc' => $this->faker->word,
            'active' => $this->faker->word,
            'user_id' => 1,
            'image' => $this->faker->word,
            'status' => $this->faker->word,
        ];
    }
}