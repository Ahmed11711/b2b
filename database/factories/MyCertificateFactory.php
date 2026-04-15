<?php
namespace Database\Factories;
use App\Models\MyCertificate;
use Illuminate\Database\Eloquent\Factories\Factory;
class MyCertificateFactory extends Factory {
    protected $model = MyCertificate::class;
    public function definition(): array {
        return [
            'user_id' => 1,
            'title' => $this->faker->word,
            'issue_date' => $this->faker->word,
            'image' => $this->faker->word,
            'description' => $this->faker->word,
        ];
    }
}