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

        Schema::table('news_translations', function(Blueprint $table) {
          $table->mediumText('mini_description')->after('description');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news_translations', function (Blueprint $table) {
          // $table->dropForeign('mini_description');
          $table->dropColumn('mini_description');
        });
    }
};
