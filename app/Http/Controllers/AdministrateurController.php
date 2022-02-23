<?php

namespace App\Http\Controllers;

use App\Imports\BeneficiaireProgrammesImport;
use App\Imports\UsersImport;
use App\Models\CandidatComissaireCompte;
use App\Models\CandidatPresidentielle;
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
       // Excel::import(new UsersImport,request()->file('file'));
        $limit = ini_get('memory_limit');
        ini_set('memory_limit', -1);
        ini_set('max_execution_time', 300);

        //Excel::import(new BeneficiaireProgrammesImport(),request()->file('file'));
        Excel::import(new UsersImport,request()->file('file'));
        return back();
    }

    public function resultatcommissaire() {
        $commissaires = CandidatComissaireCompte::all();
        $candidats = CandidatPresidentielle::all();
        return view('customs.admin.resultat',compact('commissaires','candidats'));
    }

}
