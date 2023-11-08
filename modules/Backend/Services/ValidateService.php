<?php

namespace Modules\Backend\Services;

use Illuminate\Support\Facades\Validator;

class ValidateService
{
    public function validate($data, $text = '')
    {
        // dd($data);
        $messages = "";
        $str = !empty($text) ? ' ' . $text : ''; // VD: danh mục
        $validator = Validator::make(
            $data,
            [
                'code' => array_key_exists('code', $data) ? 'required' : '',
                'name' => 'required',
                'order' => ['required','numeric'],
            ],[
                'code.required' => 'Mã' . $str . ' không được để trống!',
                'name.required' => 'Tên' . $str . ' không được để trống!',
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