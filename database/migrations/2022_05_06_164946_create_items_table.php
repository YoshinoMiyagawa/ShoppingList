<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     
     
     
     
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('shoppinglist_id');
            $table->string('name');
            $table->string('content');
            $table->boolean('status');
            $table->dateTime('deadline');
            $table->timestamps();
            
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('shoppinglist_id')->references('id')->on('shoppinglists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}

