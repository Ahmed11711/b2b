<?php
namespace Database\Factories;
use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;
class CityFactory extends Factory {
    protected $model = City::class;
    public function definition(): array {
        return [
            'country_id' => 1,
            'name_ar' => $this->faker->word,
            'name_en' => $this->faker->word,
            'is_active' => $this->faker->word,
        ];
    }
}