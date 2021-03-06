<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespondentTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respondent_tests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('respondent_id');
            $table->uuid('code', 60);
            $table->text('metadata');
            $table->tinyInteger('was_finished')->default(0)->comment('0 Não finalizado | 1 finalizado');
            $table->string('ip')->nullable();
            $table->string('user_agent')->nullable();
            $table->string('geolocation')->nullable();
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
        Schema::dropIfExists('respondent_tests');
    }
}
