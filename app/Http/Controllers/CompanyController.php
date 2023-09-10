<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function store(Request $request)
    {
        try {
            if ($request->hasFile('file')) {
                $file = $request->file('file')->store('/file/company', 'public');
            }

            $company = Company::create([
                'company_name' => $request->name,
                'company_website' => $request->website,
                'company_linkedin' => $request->linkedln,
                'company_since' => $request->since,
                'company_description' => $request->deskripsi,
                'company_number' => $request->telp,
                'company_position' => $request->position,
                'company_logo' => $file,
                'company_role_id' => 'FOV4Qtgi5lcQ9kZ'
            ]);

            return response()->json([
                'success' => true,
                'data' => $company,
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
