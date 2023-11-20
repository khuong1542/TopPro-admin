<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Backend\Models\ListModel;
use Modules\Backend\Models\ListtypeModel;

class ListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Danh mục đối tượng Loại bài viết
        $loaibaiviet = ListtypeModel::where('code', 'DM_LOAI_BAI_VIET')->first();
        $param1 = [
            ['id' => (string)\Str::uuid(),'listtype_id' => $loaibaiviet->id,'code' => 'TIN_NOI_BAT',  'name' => 'Tin nổi bật',  'order' => 1,'status' => 1,'created_at' => date('Y-m-d H:i:s'),],
            ['id' => (string)\Str::uuid(),'listtype_id' => $loaibaiviet->id,'code' => 'TIN_MOI',      'name' => 'Tin mới',      'order' => 2,'status' => 1,'created_at' => date('Y-m-d H:i:s'),],
            ['id' => (string)\Str::uuid(),'listtype_id' => $loaibaiviet->id,'code' => 'TIN_HIEN_THI', 'name' => 'Tin hiển thị', 'order' => 3,'status' => 1,'created_at' => date('Y-m-d H:i:s'),],
            ['id' => (string)\Str::uuid(),'listtype_id' => $loaibaiviet->id,'code' => 'THONG_BAO',    'name' => 'Thông báo',    'order' => 4,'status' => 1,'created_at' => date('Y-m-d H:i:s'),],
        ];
        ListModel::insert($param1);
        // Danh mục đối tượng Trạng thái bài viết
        $trangthaibaiviet = ListtypeModel::where('code', 'DM_TRANG_THAI_BAI_VIET')->first();
        $param2 = [
            ['id' => (string)\Str::uuid(),'listtype_id' => $trangthaibaiviet->id,'code' => 'BAN_DOC_GUI', 'name' => 'Bạn đọc gửi', 'order' => 1,'status' => 1,'created_at' => date('Y-m-d H:i:s'),],
            ['id' => (string)\Str::uuid(),'listtype_id' => $trangthaibaiviet->id,'code' => 'CHO_DUYET',   'name' => 'Chờ duyệt',   'order' => 2,'status' => 1,'created_at' => date('Y-m-d H:i:s'),],
            ['id' => (string)\Str::uuid(),'listtype_id' => $trangthaibaiviet->id,'code' => 'DA_DUYET',    'name' => 'Đã duyệt',    'order' => 3,'status' => 1,'created_at' => date('Y-m-d H:i:s'),],
            ['id' => (string)\Str::uuid(),'listtype_id' => $trangthaibaiviet->id,'code' => 'TU_CHOI',     'name' => 'Từ chối',     'order' => 4,'status' => 1,'created_at' => date('Y-m-d H:i:s'),],
        ];
        ListModel::insert($param2);
    }
}
