<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\QuestionBank;
use App\Models\TestCollection;
use App\Models\TestPassages;
use App\Models\TestQuestion;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(20)->create();
        TestPassages::factory(20)->create();
        QuestionBank::factory(20)->create();
        TestCollection::factory(3)->create();
        TestQuestion::factory(60)->create();
    }
}

