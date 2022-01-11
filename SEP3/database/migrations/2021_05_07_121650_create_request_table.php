<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crequest', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('devicetype');
            $table->string('deviceos');
            $table->string('model');
            $table->string('repairdetails');
            $table->string('estimated_cost');
            $table->string('s_approval');
            $table->string('staffincharge');
            $table->string('c_approval');
            $table->string('status');
            $table->string('comment');
            $table->string('finalprice');
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
        Schema::dropIfExists('crequest');
    }
}
