<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('irt_results', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('test_id');
            $table->string('user_id');
            $table->unsignedBigInteger('question_id');
            $table->string('question_text');
            $table->string('key_answer');
            $table->string('answer');
            $table->string('a_value');
            $table->string('b_value');
            $table->string('c_value');
            $table->float('theta');
            $table->integer('is_correct');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('irt_results');
    }
};
