<?php
// tạo ra các tùy chọn
return [
    'sidebar' => [
       [     'title' => 'Thông tin công ty',
            'icon' => 'la la-file-text',
            'route' => 'get_employer.company.index'
        ],
        [     'title' => 'Danh sách công việc',
            'icon' => 'la la-briefcase',
            'route' => 'get_employer.job.index'
        ],
        [     'title' => 'Ứng tuyển',
            'icon' => 'la la-money',
            'route' => 'get_employer.apply_job.index'
        ],

        [     'title' => 'Đăng xuất',
            'icon' => 'la la-unlink',
            'route' => 'get.logout'
        ],
    ]
];
