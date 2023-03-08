<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AttributeSize extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_size', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attributes_id');
            $table->unsignedBigInteger('sizes_id');
            $table->foreign('attributes_id')->references('id')->on('attributes')->onDelete('cascade');
            $table->foreign('sizes_id')->references('id')->on('sizes')->onDelete('cascade');
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
        Schema::dropIfExists('property_size');
    }
};
