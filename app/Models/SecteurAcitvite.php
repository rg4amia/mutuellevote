<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecteurAcitvite extends Model
{
    use HasFactory;

    protected $table = 'digit_parametrage_secteuractivite';
    protected $fillable = [
        'libelle',
        'description'
    ];
}
