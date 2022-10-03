<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeneficiaireProjetFinancement extends Model
{
    use HasFactory;

    protected $table = 'digit_beneficiaire_projet_financement';

    protected $fillable = [
        'region','sousprefect_commune','programme','numeroaej',
        'promoteur','datecertification','anneecertification',
        'datemiseenplacepret','anneemiseenplace'
    ];
}
