<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\Campaign;
use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'John Doe'
        ]);

        // Categorías con valores específicos
        $categories = [
            ['name' => 'DnD 3.5', 'slug' => 'dnd-3-5'],
            ['name' => 'DnD 5E', 'slug' => 'dnd-5e'],
            ['name' => 'Anima:Beyond Fantasy', 'slug' => 'anima-beyond-fantasy'],
            ['name' => 'Pathfinder', 'slug' => 'pathfinder'],
            ['name' => 'Call of Cthulhu', 'slug' => 'call-of-cthulhu'],
            ['name' => 'Vampire: The Masquerade 5th Edition', 'slug' => 'vampire-the-masquerade-5th-edition'],
            ['name' => 'Mutant:Year Zero', 'slug' => 'mutant-year-zero'],
            ['name' => 'Warhammer', 'slug' => 'warhammer'],
        ];

        // Crear las categorías
        foreach ($categories as $categoryData) {
            Category::factory()->create($categoryData);
        }


        for ($i = 0; $i < 15; $i++) {
            Campaign::factory()->create([
                'user_id' => $user->id,
                'category_id' => Category::all()->random()->id
            ]);
        }

        /*Application::factory(10)->create([
            'user_id' => $user->id
        ]);*/
        // User::factory(10)->create();

        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/
    }
}
