<?php

namespace App\Http\Controllers;

use App\oMail;
use App\Models\etudiants;
use App\Models\messages;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function getAllStudents() {
        $etd = etudiants::get();
        return response()->json([
            "listes" => $etd
        ], 200);
    }

    public function createStudent(Request $request) {

        //creer l'étudiant comme un user
        $usr = new User;
        $usr->login= 'miage'.$request->matricule;
        $usr->password= 'miage'.$request->mobile;
        $usr->type_users= 2;
        $usr->created_at=time();
        $usr->save();
        $usr_id= DB::table("users")->latest()->first();

        //creer un nouvel etudiant
        $etd = new etudiants;
        $etd->nom = $request->name;
        $etd->prenom = $request->surname;
        $etd->matricule = $request->matricule;
        $etd->id_classe = $request->classe;
        $etd->email = $request->email;
        $etd->contact = $request->mobile;
        $etd->id_user = $usr_id->id;
        $etd->save();

        return response()->json('Etudiant enregistré', 201);
    }

    public function getStudents($id) {
        if (etudiants::where('matricule','=', $id)->exists()) {
            $etd = etudiants::where ('matricule','=', $id)->get()->toJson(JSON_PRETTY_PRINT);
        return response($etd, 200);
      } else {
            return response()->json('introuvable', 404);
      }
    }

    public function updateStudent(Request $request, $id) {
        if (etudiants::where('matricule', $id)->exists()) {
            $student = etudiants::find($id);
            $student->nom = is_null($request->name) ? $student->nom : $request->name;
            $student->prenom = is_null($request->surname) ? $student->prenom : $request->surname;
            $student->matricule = is_null($request->smatricule) ? $student->matricule : $request->matricule;
            $student->id_classe = is_null($request->classe) ? $student->id_classe : $request->classe;
            $student->email = is_null($request->email) ? $student->email : $request->email;
            $student->contact = is_null($request->mobile) ? $student->contact : $request->mobile;
            $student->save();

            return response()->json([
                "message" => "records updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "Student not found"
            ], 404);

        }
    }

    public function deleteStudent ($id) {
        if(etudiants::where('id_pers', $id)->exists()) {
            $student = etudiants::find($id);
            $student->delete();

            return response()->json([
                "message" => "enregistrement supprime"
            ], 202);
        } else {
            return response()->json([
                "message" => "introuvable"
            ], 404);
        }
    }

    public function sendSms(Request $request) {
        $d=$request->destinataire;
        $o=$request->object;
        $c=$request->corps;

        //enregristrement en bd
        $msg= new messages;
        $msg->destinataire=$d;
        $msg->object=$o;
        $msg->corps=$c;
        $msg->type_mesg=2;
        $msg->save();
    }

    public function sendEmail (Request $request){
        $d=$request->destinataire;
        $o=$request->object;
        $c=$request->corps;

        //enregristrement en bd
        $msg= new messages;
        $msg->destinataire=$d;
        $msg->object=$o;
        $msg->corps=$c;
        $msg->type_mesg=1;
        $msg->save();

        //envoie du mail
        oMail\sendMail::oneMail($d,$o,$c);

        return response()->json('message send',200);
    }

    public function getMail($id) {
        $mesg= DB::table('messages')->join('etudiants','messages.destinataire','=','etudiants.email')
            ->where('id_pers','=',$id)->get();
        return response()->json($mesg,200);
    }

    public function getSms($id) {
        $mesg= DB::table('messages')->join('etudiants','messages.destinataire','=','etudiants.contact')
            ->where('id_pers','=',$id)->get();
        return response()->json($mesg,200);
    }

    public function getAllEmail (){
        $mesg= DB::table('messages')->where('type_mesg','=',1)->get();
        return response()->json($mesg,200);
    }

    public function getAllSms (){
        $mesg= DB::table('messages')->where('type_mesg','=',2)->get();
        return response()->json($mesg,200);
    }

}
