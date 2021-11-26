<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserGeneralInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_general_information', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('gemail')->unique();
            $table->string('postal_code')->nullable();
            $table->longText('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->unsignedBigInteger('country')->nullable();
            $table->string('telephone')->nullable();
            $table->string('fax')->nullable();
            $table->string('mobile_phone')->nullable();
            $table->string('second_email')->unique();
            $table->string('website')->nullable();
            $table->string('company_name')->nullable();
            $table->string('position')->nullable();
            $table->longText('secret_question')->nullable();
            $table->longText('secret_answer')->nullable();
            $table->longText('special_keywords')->nullable();
            $table->longText('accreditations')->nullable();
            $table->longText('membership_professional_associations')->nullable();
            $table->longText('platform_hardware')->nullable();
            $table->longText('cover_letter')->nullable();
            $table->string('advertising_slogan')->nullable();
            $table->foreign('country')->references('id')->on('countries');
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
        Schema::dropIfExists('user_general_information');
    }
}
