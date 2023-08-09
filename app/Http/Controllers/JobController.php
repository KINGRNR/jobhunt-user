<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Job;

class JobController extends Controller
{
    public function index()
    {
        $jobs = DB::table('v_job')->get();        
        return response()->json(['jobs' => $jobs]);
    }
}
