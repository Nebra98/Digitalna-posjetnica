<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('qr_code')->nullable();
            $table->string('avatar')->default('default.png');
            $table->string('company_vcf')->nullable();
            $table->string('job_vcf')->nullable();
            $table->string('mobile_private_vcf')->nullable();
            $table->string('mobile_work_vcf')->nullable();
            $table->string('email_private_vcf')->nullable();
            $table->string('email_work_vcf')->nullable();
            $table->string('address_vcf')->nullable();
            $table->string('website_vcf')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
