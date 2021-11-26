<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsPairLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs_pair_languages', function (Blueprint $table) {
            $table->id();
            $table->string('from_lang')->nullalbe();
            $table->string('to_lang')->nullable();
            $table->bigInteger('jobs_id')->unsigned();
            $table->foreign('jobs_id')->references('id')->on('jobs')->onDelete('cascade');
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
        Schema::dropIfExists('jobs_pair_languages');
    }
}
