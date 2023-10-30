<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Resume;
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
        if ($request->hasFile('resume_official_photo')) {
            if (!empty($existingResume->resume_official_photo)) {
                unlink(public_path('file/company/' . $existingResume->resume_official_photo));
            }

            $photoFile = $request->file('resume_official_photo');
            $photoName = Str::random(15) . '_' . time() . '.' . $photoFile->getClientOriginalExtension();
            $photoFile->move(public_path('file/company/'), $photoName);
            $data['resume_official_photo'] = $photoName;
        }

        if ($request->hasFile('resume_file')) {
            if (!empty($existingResume->resume_file)) {
                unlink(public_path('file/company/' . $existingResume->resume_file));
            }

            $resumeFile = $request->file('resume_file');
            $resumeName = Str::random(15) . '_' . time() . '.' . $resumeFile->getClientOriginalExtension();
            $resumeFile->move(public_path('file/company/'), $resumeName);
            $data['resume_file'] = $resumeName;

            $existingResume->update($data);
        }
    } else {
        if ($request->hasFile('resume_official_photo')) {
            $photoFile = $request->file('resume_official_photo');
            $photoName = Str::random(15) . '_' . time() . '.' . $photoFile->getClientOriginalExtension();
            $photoFile->move(public_path('file/company/'), $photoName);
            $data['resume_official_photo'] = $photoName;
        }

        if ($request->hasFile('resume_file')) {
            $resumeFile = $request->file('resume_file');
            $resumeName = Str::random(15) . '_' . time() . '.' . $resumeFile->getClientOriginalExtension();
            $resumeFile->move(public_path('file/company/'), $resumeName);
            $data['resume_file'] = $resumeName;
        }

        Resume::create($data);
    }

    return response()->json([
        'success' =>  true,
        'status' =>  'Success',
        'title' => 'Sukses!',
        'message' => 'Data Berhasil Tersimpan!',
        'code' => 201
    ]);
}

}
