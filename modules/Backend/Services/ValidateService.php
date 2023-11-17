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
                'code' => isset($data['code']) ? 'required' : '',
                'name' => 'required',
                'slug' => isset($data['slug']) ? 'required' : '',
                'order' => ['required','numeric'],
            ],[
                'code.required' => 'Mã' . $str . ' không được để trống!',
                'name.required' => 'Tên' . $str . ' không được để trống!',
                'slug.required' => 'Đường dẫn' . $str . ' không được để trống!',
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