<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstallInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('install_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('installer_id');
            $table->foreign('installer_id')->references('id')->on('users');
            $table->string('experience');
            $table->longText('skills')->nullable();
            $table->double('recharge');
            $table->string('installation_type');
            $table->enum('status', ['0', '1'])->default('1');
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
        Schema::dropIfExists('install_infos');
    }
}
