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
            $table->uuid('id')->change();
            $table->string('name')->nullable()->change(); // Tên
            $table->string('email')->nullable()->change(); // Email
            $table->string('password')->nullable()->change(); // Mật khẩu

            $table->string('username')->after('name')->nullable(); // Username
            $table->string('birthday')->after('remember_token')->nullable(); // Ngày sinh
            $table->string('phone')->after('birthday')->nullable(); // Số điện thoại
            $table->string('gender')->after('phone')->nullable(); // Giới tính
            $table->string('avatar', 2000)->after('gender')->default('user-default.png'); // Ảnh đại diện
            
            $table->string('city')->after('avatar')->nullable(); // Tỉnh / Thành
            $table->string('district')->after('city')->nullable(); // Quận / Huyện/ Thành phố
            $table->string('ward')->after('district')->nullable(); // Phường / Xã / Thị trấn
            $table->text('address')->after('ward')->nullable(); // Địa chỉ chi tiết

            $table->tinyInteger('role')->after('address')->nullable(); // Quyền
            $table->integer('order')->after('role')->nullable(); // Thứ tự
            $table->tinyInteger('status')->after('order')->nullable(); // Trạng thái
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
            $table->dropColumn('username');
            $table->dropColumn('birthday');
            $table->dropColumn('phone');
            $table->dropColumn('gender');
            $table->dropColumn('avatar');
            
            $table->dropColumn('city');
            $table->dropColumn('district');
            $table->dropColumn('ward');
            $table->dropColumn('address');

            $table->dropColumn('role');
            $table->dropColumn('order');
            $table->dropColumn('status');
        });
    }
};
