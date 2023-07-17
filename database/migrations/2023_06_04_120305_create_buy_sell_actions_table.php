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
        Schema::create('buy_sell_actions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('from_wallet');
            $table->unsignedBigInteger('to_wallet');
            $table->string('type');
            $table->string('section')->nullable();
            $table->string('command')->nullable();
            $table->string('tracking_no')->nullable();
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
        Schema::dropIfExists('buy_sell_actions');
    }
};
