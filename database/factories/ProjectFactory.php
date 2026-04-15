<?php
namespace Database\Factories;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
class ProjectFactory extends Factory {
    protected $model = Project::class;
    public function definition(): array {
        return [
            'user_id' => 1,
            'title' => $this->faker->word,
            'project_date' => $this->faker->word,
            'image' => $this->faker->word,
            'description' => $this->faker->word,
        ];
    }
}