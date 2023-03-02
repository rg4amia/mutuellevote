<?php

namespace App\Imports;

use App\Models\BeneficiairePns;
use Carbon\Carbon;
//use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

class BeneficiairePnsImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
   /*  public function model(array $row)
    { */
        //dd($row);
        /*  0 => "BROU AKA ANKIL  "
  1 => "PORO"
  2 => "KORHOGO"
  3 => 36855
  4 => "H"
  5 => "FIBRE OPTIQUE"
  6 => "FRR" */
       /*  return new BeneficiairePns([
                'region'                => @$row[1] ?? '',
                'departement'           => @$row[2] ?? '',
                'sousprefect_commune'   => '',
                'quartier_village'      => '',
                'nomprenoms'            => @$row[0] ?? '',
                'datenaissance'         => @Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject((int)$row[3] ?? ''))->format('Y-m-d'),
                'secteuractivite'       => '',
                'sexe'                  => @$row[4] ?? '',
                'programme'             => @$row[6] ?? '',
                'intituleformation'     => @$row[5]
        ]); */
    /* } */

    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        //
    }
}
