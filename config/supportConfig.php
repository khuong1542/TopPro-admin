<?php

return [
    'danhmuctinhthanh' => [
        'code' => 'DM_TINH_THANH',
        'name' => 'Lấy danh mục Tỉnh thành',
        'url' => 'https://provinces.open-api.vn/api/p/',
        'params' => [],
        'method' => 'get',
    ],
    'danhmucquanhuyen' => [
        'code' => 'DM_QUAN_HUYEN',
        'name' => 'Lấy danh mục Quận huyện',
        'url' => 'https://provinces.open-api.vn/api/d/',
        'params' => [],
        'method' => 'get',
    ],
    'danhmucphuongxa' => [
        'code' => 'DM_PHUONG_XA',
        'name' => 'Lấy danh mục Phường xã',
        'url' => 'https://provinces.open-api.vn/api/',
        'params' => [],
        'method' => 'get',
        'child' => [
            'tatca' => [
                'code' => 'DM_PHUONG_XA',
                'name' => 'Tất cả',
                'url' => 'https://provinces.open-api.vn/api/',
                'params' => ['depth' => 3],
                'method' => 'get',
            ],
            'tinhthanh' => [
                'code' => 'DM_TINH_THANH',
                'name' => 'Theo Tỉnh thành',
                'url' => 'https://provinces.open-api.vn/api/p/',
                'params' => ['depth' => 3],
                'method' => 'get',
            ],
            'quanhuyen' => [
                'code' => 'DM_QUAN_HUYEN',
                'name' => 'Theo Quận Huyện',
                'url' => 'https://provinces.open-api.vn/api/d/',
                'params' => ['depth' => 2],
                'method' => 'get',
            ],
            'phuongxa' => [
                'code' => 'DM_PHUONG_XA',
                'name' => 'Theo Phưỡng xã',
                'url' => 'https://provinces.open-api.vn/api/w/',
                'params' => [],
                'method' => 'get',
            ],
        ],
    ],
];