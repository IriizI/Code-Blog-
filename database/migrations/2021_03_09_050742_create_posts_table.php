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
            $table->string('title');
            $table->string('slug');
            $table->string('description');
            $table->string('image');
            $table->string('extract');
            $table->enum('status', [0,1,2])->default(0);
            //declararemos nuestras llaves foraneas
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('tag_id');
            $table->unsignedBigInteger('category_id');
            //configurar llaves foraneas
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('tag_id')->references('id')->on('categories');
            $table->foreign('category_id')->references('id')->on('tags');

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
