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
        Schema::create('blogs', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('categories_id'); // Chuyên mục
            $table->string('title', 2000); // Tiêu đề
            $table->string('slug', 2000); // Đường dẫn
            $table->string('author')->nullable(); // Tác giả
            $table->string('source')->nullable(); // Nguồn
            $table->date('date_create')->nullable(); // Ngày đăng
            $table->string('images', 2000)->nullable(); // Ảnh bài viết
            $table->string('images_note', 2000)->nullable(); // Chú thích ảnh
            $table->text('content')->nullable(); // Nội dung bài viết
            $table->string('blog_type')->nullable(); // Loại bài viết
            $table->string('current_status')->nullable(); // Trạng thái bài viết hiện tại
            $table->text('related_keywords')->nullable(); // Từ khóa liên quan
            $table->integer('is_comment')->nullable(); // Hiển thị bình luận
            $table->integer('is_hide_relate_blog')->nullable(); // Ẩn tin liên quan
            $table->integer('view')->nullable(); // Lượt xem
            $table->integer('like')->nullable(); // Lượt thích
            $table->string('rating')->nullable(); // Lượt đánh giá
            $table->integer('order')->nullable(); // Thứ tự
            $table->tinyInteger('status')->nullable(); // Trạng thái hoạt động
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
        Schema::dropIfExists('blogs');
    }
};
