<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Job;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->input('id');
        $jobs = DB::table('v_job')->where('job_category', $id)->get();
        return response()->json(['jobs' => $jobs]);
    }
    public function detail_job(Request $request)
    {
        // $id = $request->input('id');
        $base64EncodedData = $request->post();

        $id = base64_decode($base64EncodedData['id']);
        $jobs = DB::table('v_job')->where('job_id', $id)->get();
        return response()->json(['jobs' => $jobs]);
    }
    public function jobscount()
    {
        $jobCounts = DB::table('v_job')
            ->select('job_category', DB::raw('COUNT(*) as count'))
            ->groupBy('job_category')
            ->get();

        return response()->json(['jobCounts' => $jobCounts]);
    }
}
