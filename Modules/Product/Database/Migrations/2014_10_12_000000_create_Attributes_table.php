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
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id');
            $table->boolean('active');
            $table->boolean('have_child');
            $table->integer('order_id');
            $table->softDeletes();
            $table->timestamps();
        });



        Schema::create('attribute_translations', function(Blueprint $table) {
          $table->increments('id');
          $table->unsignedBigInteger('attribute_id');
          $table->string('locale')->index();
          $table->string('name');
          $table->unique(['attribute_id', 'locale']);
			      $table->softDeletes();
          $table->foreign('attribute_id')->references('id')->on('attributes')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_translations');
    }
};
