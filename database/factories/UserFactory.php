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
            'role' => $this->faker->word,
            'email_verified_at' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'),
            'remember_token' => $this->faker->word,
        ];
    }
}