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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('order_id');
            $table->boolean('active');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
            ->references('id')->on('categories')
            ->onDelete('cascade');
			      $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('news_translations', function(Blueprint $table) {
          $table->increments('id');
          $table->unsignedBigInteger('news_id');
          $table->string('locale')->index();
          $table->string('title');
          $table->longText('description');
          $table->unique(['news_id', 'locale']);
			      $table->softDeletes();
          $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
        Schema::dropIfExists('category_translations');
    }
};
