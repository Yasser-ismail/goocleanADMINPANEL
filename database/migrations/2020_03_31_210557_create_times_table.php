<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('times', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('workinghour_id')->index()->nullable();
            $table->unsignedBigInteger('appoientment_id')->index()->nullable();
            $table->time('time')->nullable();
            $table->tinyInteger('reserved')->default(0);
            $table->timestamps();
            $table->foreign('workinghour_id')->references('id')->on('workinghours')->onDelete('cascade');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('times');
    }
}
