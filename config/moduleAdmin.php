<?php

return [
    'dashboard' => [
        'name' => 'Trang chủ',
        'icon' => 'bx bxs-dashboard',
        'checkRole' => false,
        'child' => false
    ],
    'categories' => [
        'name' => 'Quản trị danh mục',
        'icon' => 'bx bx-menu',
        'checkRole' => 'ADMIN',
        'child' => false,
    ],
    'support' => [
        'name' => 'Hỗ trợ hệ thống',
        'icon' => 'bx bx-support',
        'checkRole' => 'ADMIN',
        'child' => false,
    ],
];