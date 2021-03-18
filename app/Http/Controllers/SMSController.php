<?php

namespace App\Http\Controllers;

use App\Models\messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SMSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //requete pour obtenier les mails deja envoyes
        $mesg= DB::table('messages')->where('type_mesg','=',2)->get();
        //dd($mesg);
        return view('page.SMS.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //enregristrement en bd
        $msg= new messages;
        $msg->destinataire=$request->input('destinataire');
        $msg->object=$request->input('object');
        $msg->corps=$request->input('corps');
        $msg->type_mesg=2;
        $msg->save();

        $etud = DB::table('etudiants')->get();
        return view('page.etudiant.index',compact('etud'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //trouver l'etudiant concerne'
        $etud = DB::table('etudiants')->join('classes','etudiants.id_classe','=','classes.id_class')
            ->where('id_pers','=',$id)->first();
        //pour afficher la page
        return view('page.SMS.index',compact('etud'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
