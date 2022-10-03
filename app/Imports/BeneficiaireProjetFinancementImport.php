<?php

namespace App\Imports;

use App\Models\BeneficiaireProjetFinancement;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;

class BeneficiaireProjetFinancementImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new BeneficiaireProjetFinancement([
                'region'                 => @$row[0],
                'sousprefect_commune'    => @$row[1],
                'programme'              => @$row[2],
                'numeroaej'              => @$row[3],
                'promoteur'              => @$row[4],
                'datecertification'      => @Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject((int)$row[5] ?? '')),
                'anneecertification'     => $row[6],
                'datemiseenplacepret'    => @Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject((int)$row[7] ?? '')),
                'anneemiseenplace'       => $row[8]
        ]);
    }
}
