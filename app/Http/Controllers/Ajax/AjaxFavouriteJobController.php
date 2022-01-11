<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\JobFavourite;
use Hashids\Hashids;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AjaxFavouriteJobController extends Controller
{
    public function addFavourite(Request $request, $hashSlug)
    {
       if ($request->ajax()) {
           try {
               //Giải mã id
               $hashids = new Hashids(config('app._token_id'));
               $hashID = $hashids->decode($hashSlug) ?? [];
               // array_pop lấy ra id truyền vào $idJob
               $idJob = array_pop($hashID);
               if(!$idJob) return response([
                   'status' => 404
               ]);
               \DB::table('job_favourite')->insert([
                   'jf_job_id' => $idJob,
                   'jf_user_id' => get_data_user('users')
               ]);
           }catch (\Exception $exception)
           {
                Log::error("Method : addFavourite" .$exception->getMessage());
           }
           return response([
               'status' => 200
           ]);
       }
    }
}
