<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
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
        return view('admin.index');
    }

    public function import(){
        return view('admin.import');
    }
    public function import_in(Request $request){
        Excel::import(new UsersImport,request()->file('file'));
        return back();
    }

}
