<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $id = Session::get('user_id');
        $data = DB::table('users')->where('id', $id)->get();
        // print_r($data); exit;
        return response()->json(['users' => $data]);
    }
}
