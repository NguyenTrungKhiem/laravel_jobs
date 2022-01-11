<?php

return [
    'drop_menu' => [
       [
           'name' => 'Cập nhật thông tin',
           'icon' => 'la la-file-text',
           'route' => 'get_employer.company.index'
       ]
    ],
    'sidebar' => [
    [     'title' => 'Danh sách ứng tuyển',
        'icon' => 'la la-file-text',
        'route' => 'get_user.job_apply.index'
    ],
    [     'title' => 'Danh sách yêu thích',
        'icon' => 'la la-briefcase',
        'route' => 'get_user.job.favourite'
    ],
    [     'title' => 'Cập nhập thông tin',
        'icon' => 'la la-user',
        'route' => 'get_user.user_info.index'
    ],
    [     'title' => 'Cập nhập mật khẩu',
            'icon' => 'la la-lock',
            'route' => 'get_user.user_password.index'
    ],
    [     'title' => 'Đăng xuất',
        'icon' => 'la la-unlink',
        'route' => 'get.logout'
    ],
]
];
