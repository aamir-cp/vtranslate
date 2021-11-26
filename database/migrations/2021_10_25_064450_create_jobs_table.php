<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_title')->nullalbe();
            $table->string('budget')->nullable();
            $table->string('job_type')->nullable();
            $table->string('job_level')->nullable();
            $table->date('expiry_date')->nullable();
            $table->tinyInteger('expiry_status')->nullable();
            $table->longtext('job_desc')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('certify')->nullalbe();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('jobs');
    }
}
