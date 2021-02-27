<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelGlassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_glasses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('addon_id');
            $table->foreign('addon_id')->references('id')->on('add_ons');
            $table->string('name');
            $table->string('image');
            $table->double('glass_price');
            $table->double('wieght');
            $table->double('length');
            $table->double('width');
            $table->double('height');
            $table->unsignedBigInteger('quantity');
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
        Schema::dropIfExists('model_glasses');
    }
}
