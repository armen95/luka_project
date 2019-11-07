<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contractors', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->text('name');
            $table->string('email');
            $table->text('contact')->nullable();
            $table->text('source_lang');
            $table->text('target_lang');
            $table->integer('hourly_payment')->nullable();
            $table->integer('word_payment')->nullable();
            $table->text('speciality')->nullable();
            $table->text('availability')->nullable();
            $table->string('tracking_system')->nullable();
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
        Schema::dropIfExists('contractors');
    }
}
