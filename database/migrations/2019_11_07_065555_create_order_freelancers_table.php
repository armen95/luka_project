<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderFreelancersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_freelancers', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('order_id')->index()->nullable();
            $table->unsignedInteger('freelancer_id')->index()->nullable();
            $table->string('word_count');

            // $table->foreign('order_id')
            //   ->references('id')->on('orders')
            //   ->onDelete('cascade');

            // $table->foreign('freelancer_id')
            //   ->references('id')->on('contractors')
            //   ->onDelete('cascade');

            // $table->timestamps();
        });


        Schema::table('order_freelancers', function($table) {
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('freelancer_id')->references('id')->on('contractors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('order_freelancers');
    }
}
