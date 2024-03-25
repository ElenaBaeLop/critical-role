<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Campaign>
 */
class CampaignFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'slug' => $this->faker->slug(),
            'name' => $this->faker->sentence(),
            'total_players' => $this->faker->numberBetween(1, 10),
            'session_frequency' => $this->faker->randomElement(['weekly', 'bi-weekly', 'monthly']),
            'language' => $this->faker->randomElement(['english', 'spanish', 'french']),
            'searching_for_players' => $this->faker->boolean(),
            'discord_server_tag' => $this->faker->word(),
            'excerpt' => $this->faker->paragraph(2),
            'body' => $this->faker->paragraph(6),
        ];
    }
}
