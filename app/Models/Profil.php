<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    protected $table= 'sfepi_profil';

    protected $fillable = [
        'id_profil', 'libelle', 'code', 'obsolete'
    ];
}
