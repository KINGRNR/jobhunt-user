<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Job;
use App\Models\Notification;
use Illuminate\Support\Facades\Session;

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
    public function save(Request $request)
    {
        // try {
            $data = $request->post();
            $idUser = Session::get('user_id');
            $company = DB::table('company')->where('company_user_id', $idUser)->select('company_id', 'company_name')->first();
            $shortName = strtoupper(substr(preg_replace('/[^a-zA-Z0-9]/', '', $company->company_name), -2));

            $randomNumber = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);

            $generatedCode = $shortName . '-' . $randomNumber;

            $operation =  Job::create([
                'job_id' => Job::generateID(),
                'job_name' => $data['formjob_worktitle'],
                'job_company_id' => $company->company_id,
                'job_description' => $data['deskripsi_job'],
                'job_category' => $data['formjob_jobcategory'],
                'job_type' => $data['formjob_jobtype'],
                'job_code' =>  $generatedCode,
                'job_requested_date' => date('Y-m-d H:i:s'),
                'job_status' => 3,
                'job_map_latitude' => $data['latitude'],
                'job_map_longitude' => $data['longitude'],
                'job_detailed_address' => $data['detailed_address'],
                'job_required_gender' => $data['formjob_sex'],
                'job_work_experience' => $data['formjob_workexp'],
                'job_expected_salary_range' => $data['formjob_wages'],
                'job_education_level' => $data['formjob_education_level'],
            ]);

            $notification = Notification::create([
                'notification_title' => 'Job Request',
                'notification_message' => 'Halo Admin!, Ada Job baru, segera proses & cek kelengkapan datanya!',
                'notification_by' => $company->company_name,
                'notification_jenis' => 2,
                'notification_to' => 'FOV4Qtgi5lcQ9kCY',
                'notification_read' => 0,
            ]);
            // print_r($notification); exit;z
            return response()->json([
                'success' => true,
                'message' => 'Job created successfully.',
            ]);
        // } catch (\Throwable $th) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => $th->getMessage(),
        //     ]);
        //     throw $th;
        // }
    }
}
