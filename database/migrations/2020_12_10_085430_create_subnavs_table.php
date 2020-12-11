<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubnavsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subnavs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('navbar_id')->unsigned();
            $table->string('subname');
            $table->string('url');
            $table->timestamps();

            $table->foreign('navbar_id')->references('id')->on('navbars')->onDelete('cascade');

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subnavs');
    }
}
