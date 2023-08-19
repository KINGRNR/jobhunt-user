<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function store(Request $request)
    {
        try {
            if ($request->hasFile('file')) {
                // $file = $request->file('file')->store('/file/company', 'public');
            }
            return response()->json($request->all());
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
