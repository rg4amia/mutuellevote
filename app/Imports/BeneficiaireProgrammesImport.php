<?php

namespace App\Imports;

use App\Models\BeneficiaireProgrammes;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class BeneficiaireProgrammesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new BeneficiaireProgrammes([
            'nomprenoms'                => @$row[0] ?? '',
            'datenaissance'             => @Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject((int)$row[1] ?? '')),
            'numaej'                    => @$row[2] ?? '',
            'programme'                 => @$row[3] ?? '',
            'region'                    => @$row[4] ?? '',
            'sousprefect_commune'       => @$row[5] ?? '',
            'annee'                     => '2021',
        ]);
    }
}
