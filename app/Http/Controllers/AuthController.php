<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function validator(array $data, $tipe = 'login')
    {
        if ($tipe == 'login') {
            return Validator::make($data, [
                'email' => ['required', 'string', 'email'],
                'password' => ['required', 'string', 'min:8'],
            ]);
        }
        return Validator::make($data, [
            'firstName' => ['required', 'string'],
            'lastName' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->view('login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function login(Request $request)
    {
        $validator = $this->validator($request->all());
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = User::Where('email', $request->email)->firstOrFail();
            $request->session()->regenerate();
            switch ($user->users_role_id) {
                case 'BfiwyVUDrXOpmStr':
                    return redirect()->route('index');
                case 'FOV4Qtgi5lcQ9kZ':
                    return redirect()->route('registercompany');
                case 'FOV4Qtgi5lcQ9kCY':
                    return redirect()->route('category');
                default:
                    return response()->json(['data' => $user], 422);
            }
        } else {
            return response()->json([
                'errors' => 'false'
            ], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }

    public function register(Request $request)
    {
        // print_r($request->all());
        $validator = $this->validator($request->all(), 'register');
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        User::create([
            'name' => $request->firstName . ' ' . $request->lastName,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'users_role_id' => 'BfiwyVUDrXOpmStr'
        ]);

        return response()->json([
            'success' => true, 
            'redirect' => route('login'), 
            'message' => 'Successfully register user.'
        ]);
    }
}
