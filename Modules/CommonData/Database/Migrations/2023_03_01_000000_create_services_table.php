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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->boolean('active');
            $table->integer('order_id');
	      		$table->softDeletes();
            $table->timestamps();
        });

        Schema::create('service_translations', function(Blueprint $table) {
          $table->increments('id');
          $table->unsignedBigInteger('service_id');
          $table->string('locale')->index();
          $table->longText('description');
          $table->string('title');
          $table->unique(['service_id', 'locale']);
			      $table->softDeletes();
          $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
        Schema::dropIfExists('service_translations');
    }
};
