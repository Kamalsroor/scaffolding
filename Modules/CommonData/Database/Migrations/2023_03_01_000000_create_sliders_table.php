<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('link');
            $table->boolean('active');
            $table->integer('order_id');
			      $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('slider_translations', function(Blueprint $table) {
          $table->increments('id');
          $table->unsignedBigInteger('slider_id');
          $table->string('locale')->index();
          $table->string('title');
          $table->string('button_title');
          $table->string('sub_title');
          $table->unique(['slider_id', 'locale']);
			      $table->softDeletes();
          $table->foreign('slider_id')->references('id')->on('sliders')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
        Schema::dropIfExists('slider_translations');
    }
};
