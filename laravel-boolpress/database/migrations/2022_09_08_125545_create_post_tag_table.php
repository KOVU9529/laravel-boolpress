<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('post_id')
            ->nullable();
            $table->unsignedBigInteger('tag_id')
            ->nullable();

            $table->foreign('post_id')
            ->references('id')
            ->on('posts')
            ->onDelete('set null');
            $table->foreign('tag_id')
            ->references('id')
            ->on('tags')
            ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_tag');
    }
}
