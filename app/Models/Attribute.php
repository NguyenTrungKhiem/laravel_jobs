<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Attribute extends Model
{
    use HasFactory;
    protected $table = 'attributes';
    protected $guarded = [''];

    // Có thể phát triên thêm nhiều chức năng
    const TYPE_EXPERiENCE = 1; // kinh nghiệm
    const TYPE_RANK = 2; // cấp bậc
    const TYPE_FORM_OF_WORK = 3; // Hình thức làm việc

    // Tạo các kiểu thuộc tính
    public $type = [
        self::TYPE_EXPERiENCE =>[
            'name' => 'Kinh nghiệm',
            'class' => 'badge-pill badge-info'
        ],
        self::TYPE_RANK =>[
            'name' => 'Cấp bậc',
            'class' => 'badge-pill badge-dark'
        ],
        self::TYPE_FORM_OF_WORK =>[
            'name' => 'Hình thức làm việc',
            'class' => 'badge-pill badge-primary'
        ],

    ];
    public function getType()
    {
        return Arr::get($this->type, $this->a_type, []);
    }
}
