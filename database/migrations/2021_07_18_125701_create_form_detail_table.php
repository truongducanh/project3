<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_detail', function (Blueprint $table) {
            $table->bigInteger('form_id')->unsigned()->index();
            $table->foreign('form_id')->references('id')->on('form')->onDelete('cascade');
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
        Schema::dropIfExists('form_detail');
    }
}
