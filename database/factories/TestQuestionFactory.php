<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TestQuestion>
 */
class TestQuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $questionIDs= DB::table('question_banks')->pluck('id');
        $testIDs= DB::table('test_collections')->pluck('id');
        return [
            'question_id' => fake()->randomElement($questionIDs),
            'test_id' => fake()->randomElement($testIDs),
        ];
    }
}
