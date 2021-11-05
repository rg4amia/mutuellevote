<?php

namespace App\Http\Controllers;

use App\Models\CandidatComissaireCompte;
use App\Models\CandidatPresidentielle;
use App\Models\User;
use App\Models\UserCandidatComissaireCompte;
use App\Models\UserCandidatPresidentielle;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function index(){
        $candidats = CandidatPresidentielle::all();
        return view('voting.president',compact('candidats'));
    }

    public function commisaire(){
        $commissaires = CandidatComissaireCompte::all();
        return view('voting.comissaire',compact('commissaires'));
    }

    public function voter ($id) {
        $code = session()->get('code');
        //dd($code);
        $user = User::where('codegene',$code)->where('status',0)->first();

        if(!$user){
            session()->flash('warning',"Vous n'êtes pas autorisé a vote.");
            return back();
        } else {
            $user->status = true;
            $user->save();

            $votecondidat = new UserCandidatPresidentielle();
            $votecondidat->userId = $user->id;
            $votecondidat->email = $user->email;
            $votecondidat->telephone = $user->telephone;
            $votecondidat->candidatpresidentiellesId = $id;
            $votecondidat->save();

            if($votecondidat){
                $candidat = CandidatPresidentielle::find($id);
                $candidat->vote = $candidat->vote + 1;
                $candidat->save();
            }
            session()->flash('success',"Felicitation !!!,Votre vote a ete pris en compte...");
            return back();
        }
    }

    public function voterCommissaire ($id) {
        $code = session()->get('code');

        $user = User::where('codegene',$code)->where('status_com',0)->first();

        if(!$user){
            session()->flash('warning',"Vous n'êtes pas autoris, vous avez deja vote");
            return back();
        } else {
            $user->status_com = true;
            $user->save();

            $votecondidat = new UserCandidatComissaireCompte();
            $votecondidat->userId = $user->id;
            $votecondidat->email = $user->email;
            $votecondidat->telephone = $user->telephone;
            $votecondidat->candidatcomissaireId = $id;
            $votecondidat->save();

            if($votecondidat){
                $candidat = CandidatComissaireCompte::find($id);
                $candidat->vote = $candidat->vote + 1;
                $candidat->save();
            }

            session()->flash('success',"Felicitation !!!,Votre vote a ete pris en compte...");
            return back();
        }
    }

    public function felicitaion(){
        $code = session()->get('code');
        if (!$code) {
            session()->flash('warning',"Cet accès n'est pas autorisé.");
            back();
        }
        return view('voting.felicitation');
    }

    public function votrechoix(){
        $code = session()->get('code');
        if (!$code) {
            session()->flash('warning',"Cet accès n'est pas autorisé.");
            back();
        }
        return view('voting.choix_vote');
    }
}
