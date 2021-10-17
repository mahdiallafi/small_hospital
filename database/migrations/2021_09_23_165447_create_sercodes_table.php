<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSercodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sercodes', function (Blueprint $table) {
            $table->id();
          ///  $table->unsignedBigInteger('user_id');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
           // $table->unsignedBigInteger('service_id');
            $table->foreignId('service_id')->references('id')->on('services')->onDelete('cascade');
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
        Schema::dropIfExists('sercodes');
    }
}
