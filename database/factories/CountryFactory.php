<?php
namespace Database\Factories;
use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;
class CountryFactory extends Factory {
    protected $model = Country::class;
    public function definition(): array {
        return [
            'name_ar' => $this->faker->word,
            'name_en' => $this->faker->word,
            'code' => $this->faker->word,
            'is_active' => $this->faker->word,
        ];
    }
}