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
            $table->string('author'); // Tác giả
            $table->string('source'); // Nguồn
            $table->string('date_create'); // Ngày đăng
            $table->string('images', 2000); // Ảnh bài viết
            $table->string('images_note', 2000); // Chú thích ảnh
            $table->text('content'); // Nội dung bài viết
            $table->integer('blog_type'); // Loại bài viết
            $table->integer('current_status'); // Trạng thái bài viết hiện tại
            $table->integer('related_keywords'); // Từ khóa liên quan
            $table->integer('is_comment'); // Hiển thị bình luận
            $table->integer('is_hide_relate_blog'); // Ẩn tin liên quan
            $table->integer('view'); // Lượt xem
            $table->integer('like'); // Lượt thích
            $table->string('rating'); // Lượt đánh giá
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
