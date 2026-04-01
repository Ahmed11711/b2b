<?php
namespace Database\Factories;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
class CategoryFactory extends Factory {
    protected $model = Category::class;
    public function definition(): array {
        return [
            'name' => $this->faker->word,
            'name_ar' => $this->faker->word,
            'image' => $this->faker->word,
            'sort_order' => $this->faker->word,
            'is_active' => $this->faker->word,
        ];
    }
}