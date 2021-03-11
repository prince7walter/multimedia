<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etudiants extends Model
{
    protected $table = 'etudiants';
    protected $primaryKey = 'id_pers';
    protected $fillable = ['nom', 'prenom','matricule','id_classe','email','contact'];

}
