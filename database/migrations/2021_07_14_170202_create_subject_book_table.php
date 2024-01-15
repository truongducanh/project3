<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_book', function (Blueprint $table) {
            $table->id();
            $table->integer('subject_id')->unsigned()->index();
            $table->foreign('subject_id')->references('subject_id')->on('subject')->onDelete('cascade');
            $table->integer('book_id')->unsigned()->index();
            $table->foreign('book_id')->references('book_id')->on('book')->onDelete('cascade');
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
        Schema::dropIfExists('subject_book');
    }
}
