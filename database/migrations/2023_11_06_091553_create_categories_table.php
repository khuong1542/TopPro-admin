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
        // Bảng danh mục
        Schema::create('categories', function (Blueprint $table) {
            $table->uuid('id'); // ID
            $table->uuid('parent_id')->nullable(); // Mã danh mục cha
            $table->string('code')->nullable(); // Mã
            $table->string('name')->nullable(); // Tên
            $table->string('slug')->nullable(); // Đường dẫn
            $table->string('layout')->nullable(); // Layout
            $table->string('type')->nullable(); // Loại danh mục
            $table->string('icon')->nullable(); // Icon
            $table->string('images')->nullable(); // Ảnh đại diện
            $table->tinyInteger('is_display_menu')->nullable(); // Hiển thị trang chủ
            $table->text('note')->nullable(); // Mô tả
            $table->integer('order')->nullable(); // Thứ tự
            $table->tinyInteger('status')->nullable(); // Trạng thái
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
        Schema::dropIfExists('categories');
    }
};
