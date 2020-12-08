<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFlagsToRespondentDiscTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('respondent_disc_tests', function (Blueprint $table) {
            $table->tinyInteger('was_finished')->default(0)->comment('0 Não finalizado | 1 finalizado')->after('metadata');
            $table->string('ip')->nullable()->after('metadata');
            $table->string('user_agent')->nullable()->after('metadata');
            $table->string('geolocation')->nullable()->after('metadata');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('respondent_disc_tests', function (Blueprint $table) {
            //
        });
    }
}
