<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_places', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_id')->references('id')->on('tours')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('place_id')->references('id')->on('places')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tour_places');
    }
}
