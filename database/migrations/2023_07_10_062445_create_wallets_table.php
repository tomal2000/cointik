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
        Schema::create('wallets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wallet_type_id');
            $table->string('wallet_no');
            $table->string('address_id')->nullable();
            $table->string('address',1000)->nullable();
            $table->decimal('balance',14,14)->default(0);
            $table->longText('meta')->nullable();
            $table->enum('status',['operative','inactive','locked','hold','suspended','pending'])->default('pending');
            $table->timestamps();

            $table->foreign('wallet_type_id')
            ->references('id')
            ->on('wallet_types')
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
        Schema::dropIfExists('wallets');
    }
};
