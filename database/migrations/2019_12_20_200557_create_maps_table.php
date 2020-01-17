<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('maps', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('url');
            $table->string('name');
            $table->float('suggested_days')->nullable();
            $table->text('details')->nullable();
            $table->string('created_by')->nullable()->default(env('ADMIN_NAME'));

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('maps');
    }
}
