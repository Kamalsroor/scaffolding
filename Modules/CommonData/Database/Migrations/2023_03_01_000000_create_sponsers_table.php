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
        Schema::create('sponsers', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_feature');
            $table->boolean('active');
            $table->integer('order_id');
	      		$table->softDeletes();
            $table->timestamps();
        });

        Schema::create('sponser_translations', function(Blueprint $table) {
          $table->increments('id');
          $table->unsignedBigInteger('sponser_id');
          $table->string('locale')->index();
          $table->string('name');
          $table->unique(['sponser_id', 'locale']);
			      $table->softDeletes();
          $table->foreign('sponser_id')->references('id')->on('sponsers')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sponsers');
        Schema::dropIfExists('sponser_translations');
    }
};
