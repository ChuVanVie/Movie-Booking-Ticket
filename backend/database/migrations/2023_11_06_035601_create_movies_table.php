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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('movie_name')->unique()->comment('Tên movie');
            $table->string('slug');
            $table->unsignedBigInteger('country_id');
            $table->string('duration')->comment('Thời lượng');
            $table->integer('year')->comment('Năm phát hành');
            $table->text('desc')->comment('Mô tả');
            $table->float('rating')->nullable()->comment('Đánh giá trung bình');
            $table->string('thumb_url')->comment('Link thumbnail');
            $table->string('poster_url')->comment('Link poster');
            $table->string('trailer_url')->comment('Link trailer');
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
