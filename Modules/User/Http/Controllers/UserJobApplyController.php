<?php

namespace Modules\User\Http\Controllers;

use App\Models\ApplyJob;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserJobApplyController extends Controller
{
    public function index()
    {
        $applyJobs = ApplyJob::with('job:id,j_name,j_hash_slug,j_slug,j_address')->where('aj_user_id', get_data_user('users'))
            ->orderByDesc('id')
            ->paginate(10);
        $applyJob = ApplyJob::select('aj_apply')->get();
        $viewData = [
            'applyJobs' => $applyJobs
        ];
        return view('user::pages.job_apply.index', $viewData, compact('applyJob'));
    }
    public function delete($id)
    {
        ApplyJob::find($id)->delete();
        return redirect()->back();
    }
}
