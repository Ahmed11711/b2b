<?php
namespace Database\Factories;
use App\Models\Ads;
use Illuminate\Database\Eloquent\Factories\Factory;
class AdsFactory extends Factory {
    protected $model = Ads::class;
    public function definition(): array {
        return [
            'user_id' => 1,
            'category_id' => 1,
            'status' => $this->faker->word,
            'title' => $this->faker->word,
            'title_ar' => $this->faker->word,
            'description' => $this->faker->word,
            'image' => $this->faker->word,
            'attachment_file' => $this->faker->word,
            'price' => $this->faker->word,
            'active' => $this->faker->word,
            'is_featured' => $this->faker->word,
            'published_at' => $this->faker->word,
            'expire_date' => $this->faker->word,
        ];
    }
}