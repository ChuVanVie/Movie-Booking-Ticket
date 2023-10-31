<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Tên người dùng');
            $table->string('email')->unique()->comment('Email');
            $table->string('password')->comment('Mật khẩu');
            $table->tinyInteger('role')->default(config('constants.ROLE.USER'));
            $table->string('avatar')->nullable()->comment('Avatar');
            $table->dateTime('dob')->nullable()->comment('Ngày sinh');
            $table->string('phone', 100)->unique(true)->nullable()->comment('SĐT');
            $table->string('address')->nullable()->comment('Địa chỉ');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
