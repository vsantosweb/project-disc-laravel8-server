<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToRespondentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('respondents', function (Blueprint $table) {
            $table->unsignedBigInteger('respondent_list_id')->default(1)->after('customer_id');
            $table->tinyInteger('status')->default(1)->after('customer_id');
            $table->foreign('respondent_list_id')->references('id')->on('respondent_lists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('respondents', function (Blueprint $table) {
            Schema::dropIfExists('respondents');
        });
    }
}
