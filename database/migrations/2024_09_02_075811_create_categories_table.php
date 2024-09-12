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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255); // Tên danh mục
            $table->string('slug', 255)->unique(); // Slug danh mục để dùng cho URL, không trùng lặp
            $table->unsignedBigInteger('parent_id')->nullable(); // ID danh mục cha, nếu có
            $table->enum('status', ['active', 'inactive'])->default('active'); // Trạng thái danh mục
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
