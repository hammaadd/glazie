<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->unsignedBigInteger('verity_id');
            $table->foreign('verity_id')->references('id')->on('prd_varieties');
            $table->string('product_name');
            $table->double('regular_price',9,2);
            $table->double('sale_price',9,2);
            $table->enum('publish',['private','public']);
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('quantity');
            $table->string('weight');
            $table->enum('type',['simple','customize','variable']);
            $table->double('length');
            $table->double('width');
            $table->double('height');
            $table->softDeletes();
            $table->unsignedBigInteger('crated_by');
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
        Schema::dropIfExists('products');
    }
}
