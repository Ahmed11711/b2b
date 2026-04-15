<?php
namespace Database\Factories;
use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;
class BranchFactory extends Factory {
    protected $model = Branch::class;
    public function definition(): array {
        return [
            'user_id' => 1,
            'title' => $this->faker->word,
            'address' => $this->faker->word,
            'mobile' => $this->faker->word,
            'lat' => $this->faker->word,
            'lng' => $this->faker->word,
        ];
    }
}