<?php
namespace Database\Factories;
use App\Models\UserInfo;
use Illuminate\Database\Eloquent\Factories\Factory;
class UserInfoFactory extends Factory {
    protected $model = UserInfo::class;
    public function definition(): array {
        return [
            'country_id' => 1,
            'city_id' => 1,
            'info' => $this->faker->word,
        ];
    }
}