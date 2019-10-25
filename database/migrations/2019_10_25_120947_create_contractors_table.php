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
            $table->bigIncrements('id');
            $table->text('name');
            $table->string('email');
            $table->text('contact');
            $table->text('source_lang');
            $table->text('target_lang');
            $table->integer('hourly_payment');
            $table->integer('word_payment');
            $table->text('speciality');
            $table->text('availability');
            $table->string('tracking_system');
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
