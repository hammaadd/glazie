<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrameGlassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frame_glasses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('frame_id');
            $table->foreign('frame_id')->references('id')->on('model_frames');
            $table->string('glass_name');
            $table->string('image');
            $table->double('price');
            $table->unsignedBigInteger('quantity');
            $table->softDeletes();
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
        Schema::dropIfExists('frame_glasses');
    }
}
