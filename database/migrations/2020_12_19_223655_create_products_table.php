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
            $table->string('product_name');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->double('regular_price',9,2);
            $table->double('sale_price',9,2);
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('quantity');
            $table->string('weight')->nullable();
            $table->enum('product_type',['window','door','frame','lentern','handle']);
            $table->enum('status',['0','1'])->default('1');
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
