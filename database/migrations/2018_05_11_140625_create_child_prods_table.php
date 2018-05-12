<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildProdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_prods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cateParen_id')->unsigned();
            $table->integer('lvl')->unsigned();
            $table->foreign('cateParen_id')
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
        Schema::dropIfExists('child_prods');
    }
}
