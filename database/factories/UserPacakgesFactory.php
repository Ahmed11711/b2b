<?php
namespace Database\Factories;
use App\Models\UserPacakges;
use Illuminate\Database\Eloquent\Factories\Factory;
class UserPacakgesFactory extends Factory {
    protected $model = UserPacakges::class;
    public function definition(): array {
        return [
            'user_id' => 1,
            'package_id' => 1,
            'starts_at' => $this->faker->word,
            'ends_at' => $this->faker->word,
            'active' => $this->faker->word,
        ];
    }
}