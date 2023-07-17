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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('from_wallet')->nullable();
            $table->unsignedBigInteger('to_wallet')->nullable();
            $table->unsignedBigInteger('market_id')->nullable();
            $table->enum('type',['instant','general'])->default('instant');
            $table->enum('department',['price','volume'])->default('price');
            $table->enum('side',['buy','sell'])->default('buy');
            $table->string('tracking_no')->nullable();
            $table->longText('price')->nullable();
            $table->longText('volume')->nullable();
            $table->longText('source_fee')->nullable();
            $table->longText('total')->nullable();
            $table->longText('receive')->nullable();
            $table->longText('fee')->nullable();
            $table->longText('meta')->nullable();
            $table->longText('initiator_payload')->nullable();
            $table->longText('confirmation_payload')->nullable();
            $table->enum('status',['pending','cancelled','confirmed','completed'])->default('pending');
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
        Schema::dropIfExists('orders');
    }
};
