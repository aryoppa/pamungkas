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
        Schema::create('irt_rules', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('antecedents');
            $table->string('consequents');
            $table->string('combined');
            $table->integer('rule_id');
            $table->string('test_id');
            $table->string('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('irt_rules');
    }
};
