<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;

    public $table = 'digit_parametrage_departement';

    public $fillable = ['sousprefecture_commune_id','libelle','region_id','district_id'];
}
