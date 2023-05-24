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
        Schema::table('wallet_types', function (Blueprint $table) {
            $table->unsignedSmallInteger('allow_decimal')->default(2)->after('is_crypto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wallet_types', function (Blueprint $table) {
            $table->dropColumn('allow_decimal');
        });
    }
};
