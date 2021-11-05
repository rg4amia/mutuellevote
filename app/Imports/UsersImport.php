<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return  new User([
            'matricule'     => $row[0],
            'nomprenom'     => $row[1],
            'name'          => $row[1],
            'genre'    => $row[2],
            'fonction'    => $row[3],
            'telephone'    => $row[4],
            'email'    => $row[5],
            'code_agence'    => $row[6],
            'password' => \Hash::make('123456'),
            ]
        );
    }
}
