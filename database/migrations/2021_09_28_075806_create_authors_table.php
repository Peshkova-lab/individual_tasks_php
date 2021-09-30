<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->string("author", 100);

           $table->string("nationality", 100);
           $table->unsignedBigInteger("picture_id");
           $table->timestamps();

           $table->foreign('picture_id')
               ->references('id')
               ->on('pictures');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authors');
    }
}
