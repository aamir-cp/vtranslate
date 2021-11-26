<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('zipcode')->nullable();
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('last_login_at')->nullable();
            $table->tinyInteger('job_notification')->default(0);
            $table->unsignedBigInteger('country_id')->nullable();
            $table->boolean('status')->nullable();
            $table->string('user_status')->nullable();
            $table->string('resume')->nullable()->comments = 'Pdf or Docs File';
            $table->string('profile_photo')->nullable();
            $table->boolean('private_information')->default('0')->comment = ' 0 for hide and 1 for show';
            $table->boolean('disallow_indexing')->default('1')->comment   = ' 1 for search engine  and 0 for not';
            $table->boolean('display_contact_info')->default('1')->comment = ' 1 for display contact info  and 0 for not';
            $table->boolean('news_notification')->default('0')->comment = ' 0 for off  and 1 for on';
            $table->boolean('jobsnotification')->default('0')->comment = ' 0 for off  and 1 for on';
            $table->boolean('show_rated_users')->default('0')->comment = ' 1 for Show the list of all outsourcers and service providers rated by you on your profile page';
            $table->foreign('country_id')->references('id')->on('countries');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
