<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Job;
use App\Service\JobFilterService;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index(Request $request, $slug)
    {
        $career = Career::where('c_slug',$slug)->first();
        if(!$career)
            return abort(404);
        $jobs = Job::with('company:id,c_name')->where([
            'j_career_id' => $career->id,
            'j_status' => Job::STATUS_SUCCESS
        ])->whereRaw(1);

        if($r = $request->r)
            $jobs->where('j_rank_id', $r);

        if($e = $request->e)
            $jobs->where('j_experience_id', $e);

        if($f = $request->f)
            $jobs->where('j_form_of_work_id', $f);

        $jobs = $jobs->orderByDesc('id')
            ->paginate(20);

        // Connect app/service/JobFilterService
        $filterJob = JobFilterService::getFilterJob();

         $viewData = [
             'jobs' => $jobs,
             'career' => $career,
             'filterJob' => $filterJob
         ];
        return view('job.index', $viewData);
    }
}
