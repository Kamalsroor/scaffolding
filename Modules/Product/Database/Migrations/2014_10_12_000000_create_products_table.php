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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // $table->string('name');
			$table->softDeletes();
            $table->timestamps();
        });



        Schema::create('product_translations', function(Blueprint $table) {
          $table->increments('id');
          $table->unsignedBigInteger('product_id');
          $table->string('locale')->index();
          $table->string('name');
          $table->unique(['product_id', 'locale']);
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
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_translations');
    }
};
