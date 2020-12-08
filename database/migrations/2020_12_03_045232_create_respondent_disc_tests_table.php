<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespondentDiscTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respondent_disc_tests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('respondent_id');
            $table->uuid('code', 60);
            $table->text('metadata');
            $table->timestamps();

            $table->foreign('respondent_id')->references('id')->on('respondents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respondent_disc_tests');
    }
}
