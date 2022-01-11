<?php

namespace Modules\Employer\Http\Controllers;

use App\Models\Career;
use App\Models\Company;
use App\Models\CompanyCareer;
use Carbon\Carbon;
use Hashids\Hashids;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Modules\Employer\Http\Requests\CompanyRequest;
class EmployerCompanyController extends Controller
{
    public function index()
    {
        //Tạo các tùy chọn có trong congig/company.php sau đó truyền vào view
        $scale = (new Company())->scale;
        $working_time = (new Company())->working_time;
        // lấy ra tất cả dữ liệu của Career
        $careers = Career::all();
        //Lấy dữ liệu và truyền vào view
        $company = Company::where('c_employer_id', get_data_user('users'))->first();

        // pluck: Lấy id của cc_careers_id trả về 1 mảng
        $careersCompany = CompanyCareer::where('cc_company_id', $company->id ?? 0)->pluck('cc_careers_id')->toArray();

        $viewData = [
            'scale' => $scale,
            'careers' => $careers,
            'company' => $company,
            'working_time' => $working_time,
            'careersCompany' => $careersCompany
        ];
        return view('employer::company.index', $viewData);
    }


    public function store(CompanyRequest $request)
    {
           $data = $request->except('_token', 'logo', 'careers');
           $data['c_slug'] = Str::slug($request->c_name);
           $data['created_at'] = Carbon::now();
           // Upload file
            if ($request->logo) {
                $image = upload_image('logo');
                if ($image['code'] == 1)
                    $data['c_logo'] = $image['name'];
            }
           // Nếu tồn tại Company thì Update
           $company = Company::where('c_employer_id', get_data_user('users'))->first();
           if ($company){
               $company->fill($data)->save();
               // Update Careers
               $this->syncCareers($request->careers, $company->id);
               return redirect()->back();
           }
           //Khởi tạo Company
            $company = Company::create($data);
             if ($company)
            {
            $company->c_employer_id = get_data_user('users');
            $company->save();
                // Mã hóa id trên URL
            $hashids = new Hashids(config('app._token_id'));
            $hashID = $hashids->encode(1,10,1,12,1231,12,13,12,$company->id);
            $company->c_hash_slug = $hashID;
            $company->save();
            }
             // Careers
             $this->syncCareers($request->careers, $company->id);
                return redirect()->back();
    }
    public function syncCareers($careers, $companyID)
    {
        // 1 Công ty có nhiều ngành nghề
        if(!empty($careers))
        {
            try {
                // Lấy dữ liệu từ Model/CompanyCareer
                CompanyCareer::where('cc_company_id', $companyID)->delete();
                foreach ($careers as $item)
                {
                    CompanyCareer::create([
                        'cc_careers_id' => $item,
                        'cc_company_id' => $companyID
                    ]);
                }
            }catch (\Exception $exception)
            {

            }
        }
    }
}
