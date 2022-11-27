<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("name", 50);
            $table->string("image", 50);
            $table->string("description", 300);
            $table->foreignId("brandId")->references("id")->on("brands");
            $table->foreignId("genderId")->references("id")->on("genders");
            $table->boolean("isDeleted")->default(false);
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
};
