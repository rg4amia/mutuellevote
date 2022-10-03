<?php

namespace App\Imports;

use App\Models\BeneficiairePns;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;

class BeneficiairePnsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new BeneficiairePns([
                'region'                => @$row[1] ?? '',
                'departement'           => @$row[2] ?? '',
                'sousprefect_commune'   => @$row[3] ?? '',
                'quartier_village'      => @$row[4] ?? '',
                'nomprenoms'            => @$row[5] ?? '',
                'datenaissance'         => @Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject((int)$row[6] ?? ''))->format('Y-m-d'),
                'secteuractivite'       => @$row[7] ?? '',
                'sexe'                  => @$row[8] ?? '',
                'programme'             => @$row[9] ?? '',
        ]);
    }
}
