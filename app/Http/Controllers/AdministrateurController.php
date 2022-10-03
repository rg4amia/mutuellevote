<?php

namespace App\Http\Controllers;

use App\Imports\BeneficiairePnsImport;
use App\Imports\BeneficiaireProgrammesImport;
use App\Imports\BeneficiaireProjetFinancementImport;
use App\Imports\CommuneImport;
use App\Imports\UsersImport;
use App\Models\AgenceRegional;
use App\Models\BeneficiairePns;
use App\Models\CandidatComissaireCompte;
use App\Models\CandidatPresidentielle;
use App\Models\Commune;
use App\Models\Departement;
use App\Models\GuichetEmploi;
use App\Models\User;
use Illuminate\Http\Request;
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
        Excel::import(new BeneficiaireProjetFinancementImport,request()->file('file'));
        //Excel::import(new BeneficiairePnsImport,request()->file('file'));
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
