<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_proposals', function (Blueprint $table) {
            $table->id();
            $table->string('from')->nullable();
            $table->string('subject')->nullable();
            $table->longtext('message')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->tinyInteger('copy_self')->default(0);
            $table->tinyInteger('include_link')->default(0);
            $table->bigInteger('jobs_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('job_proposals');
    }
}
