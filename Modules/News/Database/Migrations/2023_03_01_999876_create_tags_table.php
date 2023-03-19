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
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->boolean('active');
			      $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('tag_translations', function(Blueprint $table) {
          $table->increments('id');
          $table->unsignedBigInteger('tag_id');
          $table->string('locale')->index();
          $table->string('name');
          $table->unique(['tag_id', 'locale']);
			      $table->softDeletes();
          $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
        Schema::dropIfExists('tag_translations');
    }
};
