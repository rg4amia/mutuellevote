<?php

namespace App\Http\Controllers;

use App\Imports\BeneficiairePnsImport;
use App\Imports\BeneficiaireProgrammesImport;
use App\Imports\BeneficiaireProjetFinancementImport;
use App\Imports\CommuneImport;
use App\Imports\UsersImport;
use App\Models\AgenceRegional;
use App\Models\BeneficiairePns;
use App\Models\BeneficiaireProgrammes;
use App\Models\CandidatComissaireCompte;
use App\Models\CandidatPresidentielle;
use App\Models\Commune;
use App\Models\Departement;
use App\Models\GuichetEmploi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class AdministrateurController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    public function index(){
        $users = User::all();

        $contacticonforme = 0;

        foreach ($users as $user) {

            if (strlen($user->telephone) != 10) {
                $contacticonforme = $contacticonforme + 1;
            }
        }

        return view('customs.admin.index',compact('contacticonforme'));
        //return view('admin.index');
    }

    public function import(){
       // return view('admin.import');
        return view('customs.admin.import');
    }

    public function import_in(Request $request){
        //Excel::import(new BeneficiaireProjetFinancementImport,request()->file('file'));
        //Excel::import(new BeneficiairePnsImport,request()->file('file'));
        ini_set("memory_limit", "-1");
        set_time_limit(1000);
        /*      0 => "AEJ"
                1 => "ACTIVITES PROGRAMMATIQUES"
                2 => "DOBET ALEX THURLOTTE"
                3 => 36141
                4 => "GÔH"
                5 => "GAGNOA"
                6 => "AGIR 1"
                7 => 2016 */
        $data = Excel::toArray(new BeneficiairePnsImport,request()->file('file'));

        //[0]structure, [1]axe, [2]nom & prenom, [3]date de naissance, [4]region, [5]sous-prefecture/commune, [6]programme,[7]annee
       // dd($data[0]);

       /*  0 => array:7 [▼
                0 => 1
                1 => "ABENGOUROU"
                2 => "ADOPO"
                3 => "AMAFE RODRIGUE"
                4 => "M"
                5 => "VENTE DE TELEPHONES PORTABLES ET ACCESSOIRES"
                6 => 700000
            ]
        */

        $count = 0;
        //dd($data[0]);
        foreach ($data[0] as $item) {
            //$nom = $item[0].' '.$item[1];

            // $nom = $item[5];
            //$beneficiairepns = BeneficiairePns::where('nomprenoms','like',"%$nom%")->first();
            $region = "";
            $commune = DB::table('digit_parametrage_commune')->where('nom', 'like', "%$item[2]%")->first();
            if($commune) {
                $region = DB::table('digit_parametrage_region')->where('id', $commune->region_id)->first();
            }

            BeneficiaireProgrammes::create(
                [
                    'structure'             => 'AEJ',
                    'axe'                   => 'STAGE',
                    'nomprenoms'            => $item[0] .' '. $item[1],
                    'datenaissance'         => null,
                    'region'                => @$region->nom,
                    'sousprefect_commune'   => $item[2],
                    'programme'             => $item[4],
                    'annee'                 => 2023,
                ]
            );
           /*  BeneficiaireProgrammes::create(
                [
                    'structure'             => $item[0],
                    'axe'                   => $item[1],
                    'nomprenoms'            => $item[2],
                    'datenaissance'         => @Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject((int)$item[3] ?? ''))->format('Y-m-d'),
                    'region'                => $item[4],
                    'sousprefect_commune'   => $item[5],
                    'programme'             => $item[6],
                    'annee'                 => $item[7],
                ]
            ); */

          // if(!$beneficiairepns){
           // @Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject((int)$row[3] ?? ''))->format('Y-m-d');
                  /* BeneficiairePns::create([
                    'region'                => @$item[1] ?? '',
                   // 'departement'           => @$item[2] ?? '',
                    'sousprefect_commune'   => @$item[2] ?? '',
                    //'quartier_village'      => @$item[4] ?? '',
                    'nomprenoms'            => $nom ?? '',
                    'datenaissance'         => @Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject((int)$item[6] ?? ''))->format('Y-m-d'),
                    'secteuractivite'       => '',
                    //'sexe'                  => @$item[8] ?? '',
                    'programme'             => @$item[3] ?? '',
                    //'numeropiece'           => @$item[5] ?? '',
                    'intituleformation'     => ''
                ]); */

                $count = $count + 1;
          //  }
        }

        dd($count);

        return back();
    }

    public function import_in_old(Request $request){
       // Excel::import(new UsersImport,request()->file('file'));
        $limit = ini_get('memory_limit');
        ini_set('memory_limit', -1);
        ini_set('max_execution_time', 300);
        //Excel::import(new BeneficiaireProgrammesImport(),request()->file('file'));
        //$path = $request->file('file')->getRealPath();
        Excel::import(new UsersImport,request()->file('file'));

        //dd();
        $data = Excel::toArray(new CommuneImport,request()->file('file'));

        foreach ($data[0] as $item) {
            //dd($item[2]);
            $commune = Commune::where('nom',$item[2])->first();
            $agenceregional = AgenceRegional::where('nom',$item[6])->first();
            $guichetemploi = GuichetEmploi::where('libelle',$item[4])->first();

            if($commune!=null) {
                $c = Commune::findOrFail($commune->id);

                $c->update([
                    'divisionregionaleaej_id'   => @$agenceregional->id,
                    'guichetemploi_id'          =>  @$guichetemploi->id,
                ]);
            }
        }

       /*$data = Excel::toArray(new CommuneImport, request()->file('file'));
        foreach ($data[0] as $item){

            //recherche dans la table sous/prefecture commue
            $commune = Commune::where('nom',$item[2])->first();

            //recherche dans la table departement
            $departement = Departement::where('libelle',$item[3])->first();

            //recherche nom guichet emploi dans la table des agence regionale
            $agenceregional = AgenceRegional::whereLike('nom',$item[4])->first();

            $guichetemploi = GuichetEmploi::whereLike('libelle', $item[4])->first();

            if (!$guichetemploi) {
                GuichetEmploi::create([
                    'libelle'               => $item[4],
                    'departement_id'        => @$departement->id,
                    'commune_id'            => @$commune->id,
                    'agenceregionale_id'    => @$agenceregional->id,
                ]);
            }

            //  if ($agenceregional == null) {

            //     //lier guichet emploi a agence regionale
            //     $agenceregional = AgenceRegional::whereLike('nom',$item[6])->first();

            //     GuichetEmploi::create([
            //         'libelle'               => $item[4],
            //         'departement_id'        => @$departement->id,
            //         'commune_id'            => @$commune->id,
            //         'agenceregionale_id'    => @$agenceregional->id,
            //     ]);

            //     $guichetemploi = GuichetEmploi::whereLike('libelle',$item[4])->first();

            //     if (!$guichetemploi) {
            //         GuichetEmploi::create([
            //             'libelle'               => @$item[4],
            //             'departement_id'        => @$departement->id,
            //             'commune_id'            => @$commune->id,
            //             'agenceregionale_id'    => @$agenceregional->id,
            //         ]);
            //     }
            // }
        } */
        return back();
    }

    public function resultatcommissaire() {
        $commissaires = CandidatComissaireCompte::all();
        $candidats = CandidatPresidentielle::all();
        return view('customs.admin.resultat',compact('commissaires','candidats'));
    }

}
