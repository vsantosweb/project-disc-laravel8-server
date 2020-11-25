<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disc_sessions', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->dateTime('expire_at')->nullable();
            $table->tinyInteger('has_expired')->default(0)->comment('0 false | 1 true');
            $table->tinyInteger('active')->default(0)->comment('0 false | 1 true');
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
        Schema::dropIfExists('disc_sessions');
    }
}
