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
        Schema::table('mediable', function (Blueprint $table) {
            $table->after('collection',function($table){
                $table->unsignedBigInteger('thumbnail_id')->nullable();
                $table->foreign('thumbnail_id')->references('id')->on('media');
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mediable', function (Blueprint $table) {
          $table->dropForeign('thumbnail_id');
          $table->dropColumn('thumbnail_id');
        });
    }
};
