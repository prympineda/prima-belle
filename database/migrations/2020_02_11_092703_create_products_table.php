<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->uuid('uid')->default(\Str::uuid());
            $table->string('code')->unique();;
            $table->string('name');
            $table->integer('is_active')->default(1);
            $table->string('description')->nullable();
            $table->integer('size')->unsigned();
            $table->integer('price')->unsigned();
            $table->integer('old_price');
            $table->integer('stock')->unsigned();
            $table->integer('is_sale');
            $table->string('ribbon_tag')->nullable();
            $table->string('photo_name');
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
