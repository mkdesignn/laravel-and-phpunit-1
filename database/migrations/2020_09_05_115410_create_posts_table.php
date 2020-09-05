<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('parent_id');
            $table->string('title');
            $table->string('content');
            $table->string('type');
            $table->enum('status', ['active','deactivate']);
            $table->string('slug');
            $table->string('visible');
            $table->string('thumbnail');
            $table->string('publish_time');
            $table->string('keywords')->nullable();
            $table->string('description')->nullable();
            $table->integer('author_id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
