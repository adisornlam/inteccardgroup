<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable();
            $table->string('slug', 255)->nullable();
            $table->text('short_desc')->nullable();
            $table->longText('long_desc')->nullable();
            $table->string('image', 255)->nullable();
            $table->string('attachment', 255)->nullable();
            $table->string('link', 255)->nullable();
            $table->tinyInteger('active');
            $table->integer('created_user_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('created_user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
