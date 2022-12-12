<?php

namespace Database\Factories;

use App\Models\Proposal;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProposalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Proposal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->uuid(),
            'position' => $this->faker->name,
            'qualification' => $this->faker->text,
            'vendor' => $this->faker->firstName(),
            'description' => $this->faker->paragraph,
            'published_by' => $this->faker->name,
        ];
    }
}
