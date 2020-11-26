<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscGraphConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disc_graph_config', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('disc_graph_type_id')->comment('min|max|diff');
            $table->string('name');
            $table->tinyInteger('number');
            $table->tinyInteger('min_range');
            $table->tinyInteger('max_range');
            $table->tinyInteger('min_intensity');
            $table->tinyInteger('max_intensity');
            $table->timestamps();

            $table->foreign('disc_graph_type_id')->references('id')->on('disc_graph_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disc_graph_config');
    }
}
