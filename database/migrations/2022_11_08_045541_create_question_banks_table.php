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
        Schema::create('question_banks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->uuid()->nullable(true);
            $table->foreign('user_id')->references('id')->on('users');
            $table->longText("question");
            $table->string("option1")->nullable(true);
            $table->string("option2")->nullable(true);
            $table->string("option3")->nullable(true);
            $table->string("option4")->nullable(true);
            $table->string("answer");
            $table->foreignId('passage_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string("category");
            $table->string('code');
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
        Schema::dropIfExists('question_banks');
    }
};
