<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->text('legal_name')->nullable();
            $table->text('address')->nullable();
            $table->string('post_index')->nullable();
            $table->text('city')->nullable();
            $table->text('country')->nullable();
            $table->string('vat_number')->nullable();
            $table->text('contact_person')->nullable();
            $table->string('email');
            $table->longText('requirements')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
