<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;

    protected $table = 'sfepi_utilisateur';
    protected $primaryKey = 'id_utilisateur';
    protected $fillable = [
        'id_utilisateur', 'nom', 'prenom', 'email', 'service' ,'actif', 'date_insertion', 'locked', 'commentaire', 'biographie', 'pwd', 'date_locked', 'id_droitacces', 'img_pdp', 'img_pdc'
    ];
}
