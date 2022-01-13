<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_models', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('height');
            $table->string('arm');
            $table->string('width');
            $table->string('fullheight');
            $table->string('boxlength');
            $table->string('boxwidth');
            $table->string('boxheight');
            $table->string('initials');
            $table->string('phone');
            $table->string('mail');
            $table->string('price')->nullable();
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_models');
    }
}
