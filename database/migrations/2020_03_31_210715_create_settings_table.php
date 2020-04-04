<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('aboutus_title')->nullable();
            $table->text('aboutus_des')->nullable();
            $table->text('aboutus_content')->nullable();
            $table->timestamps();
        });

        DB::table('settings')->insert([
            'aboutus_title' =>'Insert title',
            'aboutus_des' =>'Insert description',
            'aboutus_content' =>'Insert content'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
