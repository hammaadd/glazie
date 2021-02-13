<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstallQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('install_quotes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('installer_id');
            $table->foreign('installer_id')->references('id')->on('users');
            $table->string('name');
            $table->string('email');
            $table->text('message')->nullable();
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
        Schema::dropIfExists('install_quotes');
    }
}
