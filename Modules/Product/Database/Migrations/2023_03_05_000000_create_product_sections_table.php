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


        Schema::create('product_sections', function(Blueprint $table) {
          $table->increments('id');
          $table->unsignedBigInteger('product_id');
          $table->string('order_id')->index();
          $table->string('section_id');
          $table->longText('inputs');
          $table->longText('html');
          $table->longText('complaed_html');
          $table->softDeletes();
          $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_sections');
    }
};
