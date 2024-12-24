<?php

namespace Database\Factories;

use App\Http\Controllers\CbtController;
use App\Models\TestCollection;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TestCollection>
 */
class TestCollectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $cbtController = new CbtController();
        $userIDs= DB::table('users')->pluck('id');
        return [
            'user_id' => fake()->randomElement($userIDs),
            'title' => "ab",
            'description' => fake()->paragraph(2),
            'date' => fake()->date(),
            'start_time' => fake()->time(),
            'end_time' => fake()->time(),
            'code' => $cbtController->generateUniqueCode(),
            'password' => $cbtController->generateUniqueCode(),
        ];
    }
}
