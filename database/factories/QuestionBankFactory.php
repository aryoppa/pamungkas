<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class QuestionBankFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $passagesIDs= DB::table('passages')->pluck('id');
        $userIDs= DB::table('users')->pluck('id');
        $category=["Error Identification","Sentence Completion","Vocabulary"];
        $answers=["A","B","C","D"];
        return [
            'question' => fake()->sentence(),
            'option1' => fake()->sentence(), 
            'option2' => fake()->sentence(), 
            'option3' => fake()->sentence(), 
            'option4' => fake()->sentence(),
            'answer' => $answers[array_rand($answers)],
            'user_id' => fake()->randomElement($userIDs),
            'passage_id' => fake()->randomElement($passagesIDs),
            'category'=> fake()->randomElement($category),
        ];
    }
}
