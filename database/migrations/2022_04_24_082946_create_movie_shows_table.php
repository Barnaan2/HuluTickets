<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieShowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_shows', function (Blueprint $table) {
            $table->id();
            $table->integer('Movie_id')->unsigned();
            $table->integer('Cinema_id')->unsigned();
            $table->integer('Schedule_id')->unsigned();
            $table->integer('Sold_Ticket')->unsigned()->default(0);
              $table->double('Price')->unsigned();
//             $table->index('Cinema_id');
//             $table->index('Movie_id');
//             $table->index('Schedule_id');
            $table->softDeletes();
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
        Schema::dropIfExists('movie_shows');
    }
}
