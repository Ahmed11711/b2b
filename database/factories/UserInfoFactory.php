<?php
namespace Database\Factories;
use App\Models\UserInfo;
use Illuminate\Database\Eloquent\Factories\Factory;
class UserInfoFactory extends Factory {
    protected $model = UserInfo::class;
    public function definition(): array {
        return [
            'user_id' => 1,
            'country_id' => 1,
            'city_id' => 1,
            'info' => $this->faker->word,
        ];
    }
}