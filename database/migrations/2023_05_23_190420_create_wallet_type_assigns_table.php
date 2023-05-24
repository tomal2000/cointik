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
        Schema::create('wallet_type_assigns', function (Blueprint $table) {
            $table->unsignedBigInteger('wallet_id');
            $table->unsignedBigInteger('wallet_type_id');
            $table->foreign('wallet_type_id')
            ->references('id')
            ->on('wallet_types')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('wallet_id')
            ->references('id')
            ->on('wallets')
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('wallet_type_assigns');
    }
};
