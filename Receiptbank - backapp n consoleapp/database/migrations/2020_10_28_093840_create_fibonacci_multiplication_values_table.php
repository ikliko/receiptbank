<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFibonacciMultiplicationValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fibonacci_multiplication_values', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('fibonacci_number_id');

            $table->unsignedInteger('row')->nullable();
            $table->unsignedInteger('col')->nullable();
            $table->string('value')->nullable();

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
        Schema::dropIfExists('fibonacci_multiplication_values');
    }
}
