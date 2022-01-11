<?php

namespace Database\Seeders;


use App\Models\Attribute;
use App\Models\Career;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

// Thêm các thuộc tính vào bảng CSDL
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        try {
            \DB::table('admins')->insert([
                'name' => 'TrungKhiem',
                'email' => 'khiemtr78@gmail.com',
                'phone' => '0934065565',
                'password' => \Hash::make('123456789')
            ]);
        }catch (\Exception $exception){
            Log::error("[Seed Admin]". $exception->getMessage());
        }
        // Tạo thuộc tính cho bảng Attribute
        $attributes = [
            Attribute::TYPE_EXPERiENCE => [
                    'Chưa có kinh nghiệm',
                    'Dưới 1 năm',
                    '1 năm',
                    '2 năm',
                    '3 năm',
                    '4 năm',
                    '3 năm',
                    'Trên 5 năm',
            ],
            Attribute::TYPE_RANK => [
                'Mới tốt nghiệp / Thực tập',
                'Nhân viên',
                'Trưởng nhóm',
                'Trưởng phòng',
                'Phó giám đốc',
                'Giám đốc',
            ],
            Attribute::TYPE_FORM_OF_WORK => [
                'Toàn thời gian cố định',
                'Bán thời gian cố định',
                'Bán thời gian tạm thời',
                'Thực tập',
                'Theo hợp đồng'
            ]
        ];

        foreach ($attributes as $key => $attribute)
        {
            foreach($attribute as $item)
            {
                // Đưa dữ liệu các thuộc tính vào trong CSDL
                try{
                    dump($item);
                    Attribute::insert([
                        'a_name' => $item,
                        'a_slug' => Str::slug($item),
                        'a_type' => $key,
                        'created_at' => Carbon::now()
                    ]);
                }catch (\Exception $exception)
                {

                }
            }
        }

        //Tạo thuộc tính cho bảng Career(Nghề nghiệp)
        $careers = [
            'IT phần mềm',
            'Bán hàng',
            'Khách sạn - Nhà hàng',
            'Phiên dịch - Ngoại ngữ',
            'Hành chính văn phòng',
            'Kỹ thuật',
            'Kế toán - kiểm toán',
            'Marketing - PR',
        ];

        foreach ($careers as $item)
        {
            // Đưa dữ liệu các thuộc tính vào trong CSDL
            try{
                dump($item);
                Career::insert([
                    'c_name' => $item,
                    'c_slug' => Str::slug($item),
                    'created_at' => Carbon::now()
                ]);
            }catch (\Exception $exception)
            {

            }
        }
    }
}
