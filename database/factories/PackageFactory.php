<?php
namespace Database\Factories;
use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;
class PackageFactory extends Factory {
    protected $model = Package::class;
    public function definition(): array {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->word,
            'price' => $this->faker->word,
            'active' => $this->faker->word,
            'duration_months' => $this->faker->word,
        ];
    }
}