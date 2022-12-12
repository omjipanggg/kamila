<?php

namespace Database\Factories;


use App\Models\Proposal;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ApplicantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->uuid(),
            'id_number' => $this->faker->randomNumber(),
            'name' => $this->faker->name(),
            'birth_place' => $this->faker->city(),
            'birth_date' => $this->faker->date(),
            'address_on_id' => $this->faker->address(),
            'current_address' => $this->faker->secondaryAddress(),
            'phone_number' => $this->faker->phoneNumber(),
            'email' => $this->faker->safeEmail(),
            'username' => $this->faker->word(5, true),
            // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'password' => $this->faker->password(),
            'email_verified_at' => $this->faker->dateTime(),
            'picture' => $this->faker->lexify('??????.jpg'),
            'marital_status' => $this->faker->randomElement(['Menikah', 'Lajang', 'Bercerai']),
            'remember_token' => Str::random(10),
        ];
    }
}

