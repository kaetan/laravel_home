<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameArticleIdColInCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign('comments_article_id_foreign');
            $table->dropIndex('comments_article_id_foreign');

            $table->renameColumn('article_id', 'entity_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->renameColumn('entity_id', 'article_id');

            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
        });
    }
}
