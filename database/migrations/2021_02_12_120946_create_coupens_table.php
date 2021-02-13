<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoupensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupens', function (Blueprint $table) {
            $table->id();
            $table->string('coupen_name');
            $table->string('coupen_code');
            $table->enum('discount_type',['amount','percentage'])->nullable();
            $table->double('discount')->nullable();
            $table->enum('limiteduser',['yes','no']);
            $table->unsignedBigInteger("no_of_user")->nullable();
            $table->enum('limited_time',['yes','no']);
            $table->date('last_date')->nullable();    
            $table->enum('status',['unuse','remaining','used'])->default("unuse");
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
        Schema::dropIfExists('coupens');
    }
}
