<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ranges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->enum('exterior_finish', [
                'wood',
                'roughcast',
            ]);
            $table->enum('insulating', [
                'synthetic',
                'natural',
                'biological',
            ]);
            $table->enum('top', [
                'roof_tiles',
                'slate',
                'thatch',
            ]);
            $table->enum('configuration', [
                'without_angle',
                'with_closing_angle',
                'with_opening_angle',
            ]);
            $table->boolean('template')->default(false);
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
        Schema::drop('ranges');
    }
}
