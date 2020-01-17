<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MapTag extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('map_tag', function (Blueprint $table) {
            $table->primary(['map_id', 'tag_id']);

            $table->bigInteger('map_id')->unsigned()->index();
            $table->bigInteger('tag_id')->unsigned()->index();

            $table->foreign('map_id')->references('id')->on('maps')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('map_tag');
    }
}
