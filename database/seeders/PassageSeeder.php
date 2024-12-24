<?php

namespace Database\Seeders;

use App\Models\Passage;
use App\Models\TestPassages;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PassageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TestPassages::factory(20)->create();
    }
}
