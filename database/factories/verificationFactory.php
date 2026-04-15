<?php
namespace Database\Factories;
use App\Models\verification;
use Illuminate\Database\Eloquent\Factories\Factory;
class verificationFactory extends Factory {
    protected $model = verification::class;
    public function definition(): array {
        return [
            'user_id' => 1,
            'id_card_front' => $this->faker->word,
            'id_card_back' => $this->faker->word,
            'commercial_register' => $this->faker->word,
            'tax_card' => $this->faker->word,
            'status' => $this->faker->word,
            'notes' => $this->faker->word,
        ];
    }
}