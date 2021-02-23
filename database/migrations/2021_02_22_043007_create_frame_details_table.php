<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrameDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frame_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('frame_id');
            $table->foreign('frame_id')->references('id')->on('model_frames');
            $table->enum('side',['internal','external'])->nullable();
            $table->string('value');
            $table->unsignedBigInteger('quantity');
            $table->double('price');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
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
        Schema::dropIfExists('frame_details');
    }
}
