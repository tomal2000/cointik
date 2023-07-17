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
        Schema::create('wallet_types', function (Blueprint $table) {
            $table->id();
            $table->string('display_name');
            $table->string('slug')->unique();
            $table->string('currency_code');
            $table->string('currency_name');
            $table->longText('logo')->nullable();
            $table->boolean('is_crypto')->default(true);
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamps();
        });

        Schema::table('beneficiaries', function (Blueprint $table) {
            $table->foreign('wallet_type_id')
                ->references('id')
                ->on('wallet_types')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('fees', function (Blueprint $table) {
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('wallet_types');
    }
};
