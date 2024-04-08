<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpectaclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spectacles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('piece_id');
            $table->unsignedBigInteger('salle_id');
            $table->date('date_spectacle');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('piece_id')->references('id')->on('pieces')->onDelete('cascade');
            $table->foreign('salle_id')->references('id')->on('salles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spectacles');
    }
}
