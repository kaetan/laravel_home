<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdColumnToArticlesAndQuestionsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::transaction(function() {
            Schema::table('articles', function (Blueprint $table) {
                $table->bigInteger('user_id')->after('text');
            });

            Schema::table('questions', function (Blueprint $table) {
                $table->bigInteger('user_id')->after('text');
            });

            DB::table('articles')->update(array('user_id' => 1));

            DB::table('questions')->update(array('user_id' => 1));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::transaction(function() {
            Schema::table('articles', function (Blueprint $table) {
                $table->dropColumn('user_id');
            });

            Schema::table('questions', function (Blueprint $table) {
                $table->dropColumn('user_id');
            });
        });
    }
}
