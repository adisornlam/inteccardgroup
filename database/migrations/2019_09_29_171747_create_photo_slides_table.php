<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_slides', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->text('link')->nullable();
            $table->string('photo')->nullable();
            $table->tinyInteger('active')->default(0);
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
        Schema::drop('photo_slides');
    }
}
