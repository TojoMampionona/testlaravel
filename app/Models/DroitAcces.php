<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DroitAcces extends Model
{
    use HasFactory;

    protected $table = 'sfepi_droitsacces';
    protected $primaryKey = 'id_droitacces';

    protected $fillable = [
        'id_droitacces', 'libelle', 'code' ,'obsolete'
    ];
    public $timestamps = false;
}
