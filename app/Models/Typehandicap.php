<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typehandicap extends Model
{
    use HasFactory;

    protected $table = 'digit_parametrage_typehandicap';
    protected $fillable = ['libelle','code'];
}
