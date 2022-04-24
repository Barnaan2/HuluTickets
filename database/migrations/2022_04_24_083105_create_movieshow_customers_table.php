<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieshowCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movieshow_customers', function (Blueprint $table) {
            $table->id();
            $table->integer('Movieshow_id');
            $table->integer('Customer_id');

//            $table->index('Movieshow_id');
//            $table->index('Customer_id');
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
        Schema::dropIfExists('movieshow_customers');
    }
}
