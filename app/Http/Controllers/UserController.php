<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index()
    {
        return view('page/login');
    }

    public function login()
    {
        if (Auth::attempt(['login' => request('login'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('appToken')->accessToken;
            //After successfull authentication, notice how I return json parameters
            return response()->json([
                'success' => true,
                'token' => $success,
                'user' => $user
            ]);
        } else {
            //if authentication is unsuccessfull, notice how I return json parameters
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], 401);
        }
    }
/*
    public function logout(Request $res)
    {
        if (Auth::user()) {
            $user = Auth::user()->token();
            $user->revoke();

            return response()->json([
                'success' => true,
                'message' => 'Logout successfully'
            ]);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Unable to Logout'
            ]);
        }
    }
*/
    public function log(Request $request)
    {

        $requests = $request->all();
        //dd($requests);
        //On cherche l'utilisateur et l'entreprise associée.
        $user = DB::table('users')->where(['login' => $requests['login'], 'password' => $requests['password']])->first();

        //Si l'utilisateur existe et est déconnecté.
        if($user != null) {
            return response()->json('connect',200);
            //return redirect()->route('dashbord.index');
        } else {
            return response()->json('failled',400);
        }
    }
}
