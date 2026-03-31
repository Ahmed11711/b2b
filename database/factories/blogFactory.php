<?php
namespace Database\Factories;
use App\Models\blog;
use Illuminate\Database\Eloquent\Factories\Factory;

class blogFactory extends Factory {
    protected $model = blog::class;
    public function definition(): array {
        return [
            'title' => $this->faker->word,
            'title_ar' => $this->faker->word,
            'desc' => $this->faker->words(50, true),
            'active' => $this->faker->word,
            'user_id' => \App\Models\User::first()?->id ?? 1,
            'image' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa',
            'status' => $this->faker->word,
        ];
    }
}