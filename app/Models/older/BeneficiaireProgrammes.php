<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeneficiaireProgrammes extends Model
{
    use HasFactory;

    protected $table = 'digit_beneficiaire_programmes';


    protected $fillable = [
        'region',
        'sousprefect_commune',
        'programme',
        'numaej',
        'nomprenoms',
        'datenaissance',
        'annee',
        'axe',
        'structure',
    ];
}
