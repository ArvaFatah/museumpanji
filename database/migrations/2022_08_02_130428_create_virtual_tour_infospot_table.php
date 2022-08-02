<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVirtualTourInfospotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('virtual_tour_infospots', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('virtual_tour_id_from');
            $table->string('judul');
            $table->text('keterangan')->nullable();
            $table->string('foto', 255);
            $table->string('x_axis');
            $table->string('y_axis');
            $table->string('z_axis');
            $table->string('status', 1);
            $table->timestamps();

            // Foreign key
            $table->foreign('virtual_tour_id_from')->references('id')->on('virtual_tours');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('virtual_tour_infospots');
    }
}
