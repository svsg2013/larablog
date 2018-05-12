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
            $table->increments('id');
            $table->integer('Cate_id')->unsigned();
            $table->string('title')->unique();
            $table->string('metaTitle');
            $table->string('alias');
            $table->mediumText('summary');
            $table->string('description');
            $table->longText('content');
            $table->boolean('feature')->default(0)->nullable();
            $table->string('images');
            $table->integer('prices');
            $table->integer('discount');
            $table->boolean('new')->default(0);
            $table->boolean('hot')->default(0)->nullable();
            $table->integer('sort')->default(1)->unsigned();
            $table->integer('view')->unsigned();
            $table->boolean('active')->default(1);
            $table->foreign('Cate_id')
                ->references('id')
                ->on('cate_prods')
                ->onDelete('cascade');
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
