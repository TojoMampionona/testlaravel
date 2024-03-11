<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory;

    protected $table= 'sfepi_personnel';

    protected $fillable = [
        'id_personnel', 'genre', 'nom', 'prenom', 'date_naissance', 'date_creation', 'date_entree', 'adresse_num', 'adresse_voie', 'adresse_complement', 'code_postal', 'ville', 'pays', 'tel_perso', 'tel_bureau', 'tel_portable', 'email_perso', 'email_bureau', 'situation_famille', 'commentaire', 'id_poste', 'date_demission'
    ];
}
