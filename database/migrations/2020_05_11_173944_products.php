<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
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
            $table->char('name',255);
            $table->integer('id_type');
            $table->text('description');
            $table->float('unit_price');
            $table->float('promotion_price');
            $table->char('image',255);
            $table->char('unit',255);
            $table->tinyInteger('new');
            $table->timestamps();
        });
        Schema::create('type_products', function (Blueprint $table) {
            $table->id();
            $table->char('name',255);
            $table->text('description');
            $table->char('image',255);
            $table->timestamps();
        });
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->integer('id_customer');
            $table->date('date_order');
            $table->float('total');
            $table->char('payment',255);
            $table->char('note',255)->nullable();
            $table->timestamps();
        });
        Schema::create('bill_detail', function (Blueprint $table) {
            $table->id();
            $table->integer('id_bill');
            $table->integer('id_product');
            $table->integer('quantity');
            $table->double('unit_price');
            $table->float('total');
            $table->timestamps();
        });
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->char('name',100);
            $table->char('gender',5);
            $table->char('email',50);
            $table->char('address',50);
            $table->char('phone_number',50);
            $table->char('note',200)->nullable();
            $table->double('unit_price');
            $table->float('total');
            $table->timestamps();
        });
        Schema::create('slide', function (Blueprint $table) {
            $table->id();
            $table->char('link',100);
            $table->char('image',100);
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
