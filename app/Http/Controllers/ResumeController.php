<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Resume;
use App\Models\ApplyJob;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ResumeController extends Controller
{
    public function index()
    {
        $id = Session::get('user_id');
        $data = DB::table('resume')->where('resume_user_id', $id)->get();
        return response()->json(['resume' => $data]);
    }
    public function save(Request $request)
    {
        $id = Session::get('user_id');
        $data = $request->except(['_token', 'resume_official_photo', 'resume_file']);
        $data['resume_user_id'] = $id;
        $data['resume_active'] = 1;

        $existingResume = Resume::where('resume_user_id', $id)->first();

        if ($existingResume) {
            $existingResume->delete();
        }

        if ($request->hasFile('resume_official_photo')) {
            if (!empty($existingResume->resume_official_photo)) {
                unlink(public_path('file/user_photo/' . $existingResume->resume_official_photo));
            }
            $photoFile = $request->file('resume_official_photo');
            $photoName = Str::random(15) . '_' . time() . '.' . $photoFile->getClientOriginalExtension();
            $photoFile->move(public_path('file/user_photo/'), $photoName);
            $data['resume_official_photo'] = $photoName;
        } else if (isset($existingResume->resume_official_photo)) {
            $data['resume_official_photo'] = $existingResume->resume_official_photo;
        }

        if ($request->hasFile('resume_file')) {
            if (!empty($existingResume->resume_file)) {
                unlink(public_path('file/user_photo/' . $existingResume->resume_file));
            }
            $resumeFile = $request->file('resume_file');
            $resumeName = Str::random(15) . '_' . time() . '.' . $resumeFile->getClientOriginalExtension();
            $resumeFile->move(public_path('file/user_photo/'), $resumeName);
            $data['resume_file'] = $resumeName;
        } else if (isset($existingResume->resume_file)) {
            $data['resume_file'] = $existingResume->resume_file;
        }
        // print_r($data);exit;
        Resume::create($data);

        return response()->json([
            'success' =>  true,
            'status' =>  'Success',
            'title' => 'Sukses!',
            'message' => 'Data Berhasil Tersimpan!',
            'code' => 201
        ]);
    }
    public function submitJob(Request $request)
    {

        try {
            $id = Session::get('user_id');
            $req = $request->post();
            $data['job_apply_status'] = 0;
            $data['job_apply_job_id'] = $req['data_id'];
            $data['job_apply_resume_id'] = $req['data_resume'];
            $data['job_apply_resume_user_id'] = $id;
            $operation = ApplyJob::create($data);

            return response()->json([
                'success' =>  true,
                'status' =>  'Success',
                'title' => 'Sukses!',
                'message' => 'Pengajuan Berhasil Dibuat, Tunggu Kabar Baik dari perusahaan terkait!',
                'code' => 201
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' =>  false,
                'status' =>  'error',
                'title' => 'Gagal!',
                'message' => 'Terjadi Kesalahan di Sistem!',
            ]);
        }
        print_r($data);
    }
}
