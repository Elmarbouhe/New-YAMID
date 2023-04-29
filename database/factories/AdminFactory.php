<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = User::class;

    public function definition(): array
    {
        return [
            //
            'name' => 'Admin',
            'email' => 'Admin@gmail.com',
            'admin' => 1 ,
            'email_verified_at' => now(),
            'password' => Hash::make('yahya'),
            'remember_token' => Str::random(10),

        ];
    }
}
