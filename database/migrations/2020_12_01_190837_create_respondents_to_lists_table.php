<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespondentsToListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respondents_to_lists', function (Blueprint $table) {
            $table->unsignedBigInteger('respondent_id');
            $table->unsignedBigInteger('list_id');

            $table->primary(['respondent_id', 'list_id']);

            $table->foreign('respondent_id')->references('id')->on('respondents');
            $table->foreign('list_id')->references('id')->on('respondent_lists')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respondents_to_lists');
    }
}
