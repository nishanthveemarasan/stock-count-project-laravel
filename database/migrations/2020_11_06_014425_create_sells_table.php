<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('order_no_id');
            $table->string('itemname' , 100);
            $table->enum('sell_type' , ['book' , 'sold']);
            $table->integer('sellcount');
            $table->text('note');
            $table->timestamps();
            $table->foreign('order_no_id')->references('id')->on('order_numbers');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sells');
    }
}
