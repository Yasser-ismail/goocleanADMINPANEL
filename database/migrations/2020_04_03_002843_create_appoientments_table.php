<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppoientmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appoientments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('serial')->nullable()->unique();
            $table->unsignedBigInteger('company_id')->index()->nullable();
            $table->unsignedBigInteger('client_id')->index()->nullable();
            $table->unsignedBigInteger('workinghour_id')->index()->nullable();
            $table->unsignedBigInteger('city_id')->index()->nullable();
            $table->unsignedBigInteger('time_id')->index()->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('workinghour_id')->references('id')->on('workinghours')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
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
        Schema::dropIfExists('appoientments');
    }
}
