<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuichetEmploi extends Model
{
    use HasFactory;

    protected $table = 'digit_parametrage_guichetemplois';

    protected $fillable = [
        'libelle',
        'departement_id',
        'commune_id',
        'agenceregionale_id',
    ];
}
