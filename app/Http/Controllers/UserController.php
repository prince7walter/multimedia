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

    public function login(Request $request)
    {
        $requests = $request->all();
        //dd($requests);
        //On cherche l'utilisateur et l'entreprise associée.
        $user = DB::table('users')->where(['login' => $requests['login'], 'password' => $requests['password']])->first();

        //Si l'utilisateur existe et est déconnecté.
        if($user != null) {
            return redirect()->route('dashbord.index');
        } else {
            return back()->with('message','=','login ou mot de passe incorrect');
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
        $using = DB::table('etudiants')->join('users','etudiants.id_user','=','users.id')
            ->where('users.id','=', $user->id)->first();
        $name = $using->nom.' '.$using->prenom;

        //Si l'utilisateur existe et est déconnecté.
        if($user != null) {
            return response()->json([
                'success' => true,
                'statut'=>'connected',
                'user'=> $name,
                'type' =>$user->type_users ],200);
        } else {
            return response()->json('failled',400);
        }

    }
}
