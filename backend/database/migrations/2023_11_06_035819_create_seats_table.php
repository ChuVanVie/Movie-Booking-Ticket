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
        Schema::create('seats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('theater_id');
            $table->string('seat_number')->comment('Tên phòng chiếu');
            $table->string('status')->comment('Trạng thái ghế');
            $table->integer('price')->comment('Giá ghế');
            $table->timestamps();

            $table->foreign('theater_id')->references('id')->on('theaters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seats');
    }
};
