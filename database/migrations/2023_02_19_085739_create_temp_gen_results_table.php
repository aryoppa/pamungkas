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
        Schema::create('temp_gen_results', function (Blueprint $table) {
            $table->id();
            $table->uuid()->nullable(true);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->longText("question");
            $table->string("option1")->nullable(true);
            $table->string("option2")->nullable(true);
            $table->string("option3")->nullable(true);
            $table->string("option4")->nullable(true);
            $table->string("answeropt");
            $table->string("answer")->nullable(true);
            $table->string("category");
            $table->string('passageId');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temp_gen_results');
    }
};
