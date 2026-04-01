<?php
namespace Database\Factories;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
class UserFactory extends Factory {
    protected $model = User::class;
    public function definition(): array {
        return [
            'name' => $this->faker->word,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->word,
            'country_code' => $this->faker->word,
            'is_active' => $this->faker->word,
            'email_verified_at' => $this->faker->unique()->safeEmail,
            'remember_token' => $this->faker->word,
            'role' => $this->faker->word,
            'social_type' => $this->faker->word,
            'social_id' => 1,
            'password' => bcrypt('password'),
            'last_login_at' => $this->faker->word,
        ];
    }
}