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
            'password' => bcrypt('password'),
            'phone' => $this->faker->word,
            'user_name' => $this->faker->word,
            'image' => $this->faker->word,
            'whtsapp' => $this->faker->word,
            'country_code' => $this->faker->word,
            'is_active' => $this->faker->word,
            'email_verified_at' => $this->faker->unique()->safeEmail,
            'remember_token' => $this->faker->word,
            'role' => $this->faker->word,
            'social_type' => $this->faker->word,
            'social_id' => 1,
            'city_id' => 1,
            'info' => $this->faker->word,
            'last_login_at' => $this->faker->word,
        ];
    }
}