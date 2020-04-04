<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppoientmentServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appoientment_service', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('appoientment_id')->index()->nullable();
            $table->unsignedBigInteger('service_id')->index()->nullable();
            $table->timestamps();

            $table->foreign('appoientment_id')->references('id')->on('appoientments')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appoientment_service');
    }
}
