<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstallerCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installer_companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('installer_id');
            $table->foreign('installer_id')->references('id')->on('users');
            $table->string('company_name');
            $table->string('address');
            $table->string('email');
            $table->string('logo')->nullable();
            $table->string('cover')->nullable();
            $table->string('contact_no');
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->unsignedBigInteger('state_id');
            $table->foreign('state_id')->references('id')->on('states');
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->string('postcode')->nullable();
            $table->longtext('company_description')->nullable();
            $table->enum('status',['0','1'])->default('1');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
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
        Schema::dropIfExists('installer_companies');
    }
}
