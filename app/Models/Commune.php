<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    use HasFactory;

    public $table = 'digit_parametrage_commune';

    public $fillable = [
        'nom',
        'divisionregionaleaej_id',
        'guichetemploi_id'
    ];
}
