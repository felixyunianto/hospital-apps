<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name', 50);
          $table->text('address');
          $table->string('category', 15);
          $table->string('region');
          $table->string('price');
          $table->longtext('description');
          $table->string('image');
          $table->string('longitude');
          $table->string('latitude');
          $table->integer('read')->default(0);
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
        Schema::dropIfExists('tours');
    }
}
