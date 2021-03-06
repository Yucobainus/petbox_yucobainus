<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompletedWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('completed_works', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('initials');
            $table->string('species');
            $table->string('photowithdog')->nullable();
            $table->string('photobox')->nullable();
            $table->string('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('completed_works');
    }
}
