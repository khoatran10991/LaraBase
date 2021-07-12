<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'UserName' => $this->faker->unique()->userName(),
            'Password' => Hash::make($this->faker->randomLetter()),
            'Email' => $this->faker->unique()->safeEmail(),
            'Scope' => 'admin',
            'IsActive' => 1,
            'RememberToken' => Str::random(10)
        ];
    }
}
