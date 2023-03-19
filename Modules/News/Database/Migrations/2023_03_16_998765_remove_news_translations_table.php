<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\News\Entities\News;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $old_news_tr = DB::table('news_translations')->get();
        $old_news = News::get();

        foreach ($old_news as $key => $news) {
          // $news->
          $old_news_news_tr = $old_news_tr->where('news_id' , $news->id)->first();
          $news->title = $old_news_news_tr->title;
          $news->description = $old_news_news_tr->description;
          $news->mini_description = $old_news_news_tr->mini_description;
          $news->language = 'de';
        }

        Schema::dropIfExists('news_translations');

        Schema::table('news', function(Blueprint $table) {
          $table->string('title')->after('id');
          $table->longText('description')->after('id');
          $table->mediumText('mini_description')->after('id');
          $table->string('language')->after('id');
      });
      foreach ($old_news as $key => $news) {
        $news->save();
      }


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('news', function (Blueprint $table) {
        // $table->dropForeign('mini_description');
        $table->dropColumn('mini_description');
        $table->dropColumn('title');
        $table->dropColumn('description');
        $table->dropColumn('language');

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
};
