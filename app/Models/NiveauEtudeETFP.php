<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NiveauEtudeETFP extends Model
{
    use HasFactory;

    protected $table = 'digit_parametrage_niveauetude_etfp';

    protected $fillable = [
        'libelle',
        'description'
    ];
}
