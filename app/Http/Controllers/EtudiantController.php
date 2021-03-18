<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\etudiants;
use App\Models\User;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etud = DB::table('etudiants')->join('classes','etudiants.id_classe','=','classes.id_class')->get();
        //dd($etud);
        return view('page.etudiant.index',compact('etud'));
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
        //dd($request);
        //creer l'etudiant comme un user
        $usr = new User;
        $usr->login= 'miage'.$request->input('matricule');
        $usr->password= 'miage'.$request->input('mobile');
        $usr->type_users= 2;
        $usr->created_at=time();
        $usr->save();
        $usr_id= DB::table("users")->latest()->first();

        //creer un nouvel etudiant
        $etd = new etudiants;
        $etd->nom = $request->input('name');
        $etd->prenom = $request->input('surname');
        $etd->matricule = $request->input('matricule');
        $etd->id_classe = $request->input('classe');
        $etd->email = $request->input('email');
        $etd->contact = $request->input('mobile');
        $etd->id_user = $usr_id->id;
        $etd->save();

        //retour sur la page pre
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
        //on fait un select avec sur id
        $etud = DB::table('etudiants')->join('classes','etudiants.id_classe','=','classes.id_class')
            ->where('id_pers','=',$id)->first();

        //pour afficher la page
        return view('page.etudiant.edit',compact('etud'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        //dd($request);
        $etd = etudiants::find($id);
        //var_dump($etd);

        $etd->nom = $request->input('name');
        $etd->prenom = $request->input('surname');
        $etd->matricule = $request->input('matricule');
        $etd->id_classe = $request->input('classe');
        $etd->email = $request->input('email');
        $etd->contact = $request->input('mobile');
        $etd->save();

        //retour sur la page de gestions des etudiant
        $etud = DB::table('etudiants')->get();
        return view('page.etudiant.index',compact('etud'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del= etudiants::find($id);
        $del->delete();
        return back();
    }
}
