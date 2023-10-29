<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function store(Request $request)
    {
        try {
            if ($request->hasFile('file')) {
                $file = $request->file('file')->store('file/company/', 'eksternal_storage');
            } else {
                $file = null;
            }
            // dd($request);
            $user = User::create([
                'name' => $request->name,
                'fullname' => $request->name,
                'email' => $request->email,
                'photo_profile' => $file,
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
                'company_active' => '1'
            ]);

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
