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
        Schema::create('letters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('letter_category_id');
            $table->string('name');
            $table->string('description');
            $table->date('effective_date');
            $table->date('end_date');
            $table->string('status')->default('on progress');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('letter_category_id')->references('id')->on('letter_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('letters');
    }
};
