<?php

namespace App\Http\Controllers;

use App\oMail;
use App\Exceptions\Handler;
use App\Models\etudiants;
use App\Models\messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //requete pour obtenier les mails deja envoyes
        $mesg= DB::table('messages')->join('etudiants','messages.destinataire','=','etudiants.email')
        ->where('type_mesg','=',1)->orderByDesc('messages.created_at')->get();
        //dd($mesg);
        return view('page.email.index',compact('mesg'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.email.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //recuperer les mails
        $mail=DB::table('etudiants')->where('id_classe','=',$request->classe)->get();

        //dd($mail);
        for ($i=0; $i<count($mail);$i++)
        {

            $d=$mail[$i]->email;
            $o=$request->input('object');
            $c=$request->input('corps');

            //enregristrement en bd
            $msg= new messages;
            $msg->destinataire=$d;
            $msg->object=$o;
            $msg->corps=$c;
            $msg->type_mesg=1;
            $msg->save();

            //envoie du mail
            oMail\sendMail::oneMail($d,$o,$c);
            //sendMail::oneMail();
        }
        //retour vers les messages
        $mesg= DB::table('messages')->join('etudiants','messages.destinataire','=','etudiants.email')
            ->where('type_mesg','=',1)->get();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del= messages::find($id);
        $del->delete();
        return back();
    }
}
