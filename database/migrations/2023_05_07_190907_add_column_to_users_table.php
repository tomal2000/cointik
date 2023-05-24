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
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('name', 'first_name');
            $table->string('last_name')->after('name');
            $table->string('phone_country_code')->after('email');
            $table->string('phone')->after('phone_country_code');
            $table->timestamp('phone_verified_at')->nullable()->after('email_verified_at');
            $table->string('pin')->nullable()->after('password');
            $table->integer('lc_country_id')->unsigned()->after('pin');
            $table->enum('kyc_status',['approved','waiting_for_review','waiting_for_verification','2fa_for_review','processing','unverified','completed','rejected','hold'])->default('unverified')->after('lc_country_id');
            $table->enum('status',['operative','hold','inactive','locked','suspended'])->default('operative')->after('kyc_status');
            $table->integer('wrong_attempt')->default(0)->after('status');
            $table->foreign('lc_country_id')->references('id')->on('lc_countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('first_name','name');
        });
    }
};
