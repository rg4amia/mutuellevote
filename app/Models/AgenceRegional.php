<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgenceRegional extends Model
{
    use HasFactory;

    protected $table = 'digit_parametrage_divisionregionaleaej';

    protected $fillable = ['code','nom'];
}
