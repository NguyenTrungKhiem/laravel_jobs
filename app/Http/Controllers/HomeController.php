<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Job;
use Hashids\Hashids;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $jobsNew = Job::with('company:id,c_name,c_logo')->orderByDesc('id')
            ->where('j_status', Job::STATUS_SUCCESS)
            ->limit(10)
            ->get(['id','j_name','j_address','j_slug','j_hash_slug', 'j_company_id','j_form_of_work_id']);

        $careersHot= Career::where('c_hot', Career::HOT)
//            tạo cột dữ liệu
            ->limit(8) //     Giới hạn lấy ra 8 thuộc tính
            ->orderByDesc('id')
            ->get();
//        tạo mảng nghề nghiệp
        $viewData = [
            'jobsNew' => $jobsNew,
            'careersHot' => $careersHot
    ];
        return view('home.index', $viewData);
    }
}
