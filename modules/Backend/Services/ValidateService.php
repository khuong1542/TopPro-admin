<?php

namespace Modules\Backend\Services;

use Illuminate\Support\Facades\Validator;

class ValidateService
{
    public function validate($data, $name = '')
    {
        // dd($data);
        $messages = "";
        $str = !empty($name) ? ' ' . $name : ''; // VD: danh mục
        $validator = Validator::make(
            $data,
            [
                // Danh mục
                'code' => isset($data['code']) ? 'required' : '',
                'name' => isset($data['name']) ? 'required' : '',
                // Bài viết
                'title' => isset($data['title']) ? 'required' : '',
                'slug' => isset($data['slug']) ? 'required' : '',
                // Phần chung
                'order' => ['required','numeric'],
            ],[
                // Danh mục
                'code.required' => 'Mã' . $str . ' không được để trống!',
                'name.required' => 'Tên' . $str . ' không được để trống!',
                // Bài viết
                'title.required' => 'Tiêu đề' . $str . ' không được để trống!',
                'slug.required' => 'Đường dẫn' . $str . ' không được để trống!',
                // Phần chung
                'order.required' => 'Thứ tự không được để trống!',
                'order.numeric' => 'Thứ tự phải là số!',
            ]
        );
        if ($validator->fails()) {
            $status = false;
            $messages = $validator->messages()->toArray();
        } else {
            $status = true;
        }
        $response['status']   = $status;
        $response['message']  = $messages;
        return $response;
    }
}