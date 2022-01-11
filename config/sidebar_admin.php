<?php

return  [
    [
        'name' => 'Tổng quan',
        'icon' => 'view_module',
        'route' => 'get_admin.index'
    ],
    [
    'name' => 'Ngành nghề',
    'icon' => 'vertical_split',
     'route' => 'get_admin.career.index'
    ],
    [
        'name' => 'Thuộc tính',
        'icon' => 'sync_alt',
        'route' => 'get_admin.attribute.index'
    ],
    [
        'name' => 'Công việc',
        'icon' => 'turned_in_not',
        'route' => 'get_admin.job.index'
    ],
    [
        'name' => 'Ứng viên',
        'icon' => 'supervisor_account',
        'route' => 'get_admin.user.index'
    ],
    [
        'name' => 'Ứng tuyển',
        'icon' => 'vertical_split',
        'route' => 'get_admin.apply_job.index'
    ],
];
