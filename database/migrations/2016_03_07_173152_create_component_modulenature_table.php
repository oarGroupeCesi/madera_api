<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComponentModulenatureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('component_modulenature', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity');
            $table->integer('component_id')->unsigned()->index();
            $table->integer('modulenature_id')->unsigned()->index();
            $table->foreign('component_id')->references('id')->on('components')->onDelete('cascade');
            $table->foreign('modulenature_id')->references('id')->on('modulenatures')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('component_modulenature');
    }
}
