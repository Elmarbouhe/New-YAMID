<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\post>
 */
class postFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titel= $this->faker->sentence ;
        return [
            'title' => $titel  ,
            'body' => $this->faker->paragraph,
            'slug' => Str::slug($titel),
            'image' => $this->faker->imageUrl(640, 480, 'cats', true, 'Faker'),



        ];
    }
}
