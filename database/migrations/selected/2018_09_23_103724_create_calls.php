<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalls extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('calls', function (Blueprint $table) {
          $table->increments('id');
          $table->string('details',2000);
          $table->float('evaluation');
          $table->string('cusPhone');
          $table->string('remark');
          $table->string('week');
          $table->string('month');
          $table->string('year');
          $table->integer('agent_id');
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
        Schema::dropIfExists('calls');
    }
}
