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
        Schema::create('market_tickers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('market_id');
            $table->decimal('buy',20,8);
            $table->decimal('sell',20,8);
            $table->decimal('low',20,8);
            $table->decimal('high',20,8);
            $table->decimal('open',20,8);
            $table->decimal('vol',20,8);
            $table->boolean('is_active')->default(false);
            $table->timestamps();

            $table->foreign('market_id')
            ->references('id')
            ->on('markets')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('market_tickers');
    }
};
