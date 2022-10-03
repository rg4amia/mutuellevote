<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeneficiairePns extends Model
{
    use HasFactory;

    protected $table = 'digit_beneficiaire_psn';

    protected $fillable = [
        'region',
        'departement',
        'sousprefect_commune',
        'quartier_village',
        'nomprenoms',
        'datenaissance',
        'secteuractivite',
        'sexe',
        'programme',
    ];
}
