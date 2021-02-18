<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddonDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addon_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('addon_id');
            $table->foreign('addon_id')->references('id')->on('add_ons');
            $table->string('key');
            $table->string('value');
            $table->double('price');
            $table->softDeletes();
            $table->unsignedBigInteger('quantity');
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
        Schema::dropIfExists('addon_details');
    }
}
