<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CompanyController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'file' => 'nullable|image|max:3000|mimes:jpeg,jpg,png',
            ]);
            if ($request->hasFile('file')) {
                $photoFile = $request->file('file');
                $photoName = Str::random(15) . '_' . time() . '.' . $photoFile->getClientOriginalExtension();
                $photoFile->move(public_path('file/company/'), $photoName);
            } else {
                $file = null;
            }
            // dd($request);
            $user = User::create([
                'name' => $request->name,
                'fullname' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'users_role_id' => 'FOV4Qtgi5lcQ9kZ'
            ]);

            $company = Company::create([
                'company_name' => $request->name,
                'company_website' => $request->website,
                'company_linkedin' => $request->linkedln,
                'company_since' => $request->since,
                'company_description' => $request->deskripsi,
                'company_number' => $request->telp,
                'company_position' => $request->position,
                'company_logo' => $file,
                'company_user_id' => $user->id,
                'company_role_id' => 'FOV4Qtgi5lcQ9kZ',
                'company_active' => '1',
                'company_photo' => $photoName,
                'company_isverif' => 0,
            ]);
            $notification = Notification::create([
                'notification_title' => 'Company Request',
                'notification_message' => 'Halo Admin!, Ada company baru, segera proses & cek kelengkapan datanya!',
                'notification_by' => $request->name,
                'notification_jenis' => 1,
                'notification_to' => 'FOV4Qtgi5lcQ9kCY',
                'notification_read' => 0,
            ]);
            // print_r($notification); exit;z
            return response()->json([
                'success' => true,
                'message' => 'Company created successfully.',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
            ]);
            // throw $th;
        }
    }
}
