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

        $user = session()->get('user_data');
        $code = session()->get('code');

        if (!$user && !$code) {
            return view('customs.vote.index');
        }

        $candidats = CandidatPresidentielle::all();
        return view('customs.vote.comissaire-adjoint',compact('candidats'));
    }

    public function commisaire(){
        $user = session()->get('user_data');
        $code = session()->get('code');
        if (!$user && !$code) {
            return view('customs.vote.index');
        }
        $commissaires = CandidatComissaireCompte::all();
        $candidats = CandidatPresidentielle::all();
        //return view('voting.comissaire',compact('commissaires'));
        return view('customs.vote.comissaire',compact('commissaires','candidats'));
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
            return redirect()->route('vote.felicitaion');
        }
    }

    public function voterCommissaireAdjoint($id){

        $code = session()->get('code');
        $user = User::where('codegene',$code)->where('status',0)->first();

        if(!$user){
            session()->flash('warning',"Vous n'êtes pas autorisé, vous avez déjà voté.");
            return view('customs.vote.index');
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
                session()->put('nom_comadjoint',$candidat->nom_prenom);
                $candidat->vote = $candidat->vote + 1;
                $candidat->save();
            }

            session()->flash('success',"Felicitation !!!,Votre vote a ete pris en compte...");
            return redirect()->route('vote.felicitaion');
        }
    }

    public function fullCommissaire(Request $request){

        /*"vote_commissaire" => "1"
        "vote_commissaire_adjoint" => "1"*/

        if($request->vote_commissaire || $request->vote_commissaire_adjoint){
            $code = session()->get('code');
            $user_data = session()->get('user_data');
            $user = User::where('codegene',$code)->where('status_com',0)->where('status',0)->first();

            if(!$user){
                session()->flash('warning',"Vous n'êtes pas autorisé, vous avez déjà voté.");
                return view('customs.vote.index');
            } else if ($code && $user_data) {

                if ($request->vote_commissaire) {

                    $user->status_com = true;
                    $votecondidat = new UserCandidatComissaireCompte();
                    $votecondidat->userId = $user->id;
                    $votecondidat->email = $user->email;
                    $votecondidat->telephone = $user->telephone;
                    $votecondidat->candidatcomissaireId = $request->vote_commissaire;
                    $votecondidat->save();

                    if($votecondidat){
                        $candidat = CandidatComissaireCompte::find($request->vote_commissaire);
                        session()->put('nom_commissaire',$candidat->nom_prenom);
                        $candidat->vote = $candidat->vote + 1;
                        $candidat->save();
                    }

                } else{
                    $user->status_com = true;
                    $votecondidat = new UserCandidatComissaireCompte();
                    $votecondidat->userId = $user->id;
                    $votecondidat->email = $user->email;
                    $votecondidat->telephone = $user->telephone;
                    $votecondidat->candidatcomissaireId = 0;
                    $votecondidat->save();
                }

                if ($request->vote_commissaire_adjoint) {

                    $user->status = true;
                    $votecondidat_adj = new UserCandidatPresidentielle();
                    $votecondidat_adj->userId = $user->id;
                    $votecondidat_adj->email = $user->email;
                    $votecondidat_adj->telephone = $user->telephone;
                    $votecondidat_adj->candidatpresidentiellesId = $request->vote_commissaire_adjoint;
                    $votecondidat_adj->save();

                    if($votecondidat_adj){
                        $candidat = CandidatPresidentielle::find($request->vote_commissaire_adjoint);
                        session()->put('nom_commissaire_adjoint',$candidat->nom_prenom);
                        $candidat->vote = $candidat->vote + 1;
                        $candidat->save();
                    }

                }else {
                    $user->status = true;
                    $votecondidat_adj = new UserCandidatPresidentielle();
                    $votecondidat_adj->userId = $user->id;
                    $votecondidat_adj->email = $user->email;
                    $votecondidat_adj->telephone = $user->telephone;
                    $votecondidat_adj->candidatpresidentiellesId = 0;
                    $votecondidat_adj->save();
                }
                // mise a jour des status du votant
                $user->save();
                session()->flash('success',"Felicitation !!!,Votre vote a ete pris en compte...");
                return redirect()->route('vote.felicitaion');
            }
        } else {
            session()->flash('warning',"Vous devez faire au moins un choix !!!");
            return redirect()->route('vote.commisaire');
        }
    }

    public function voterCommissaire ($id) {

        $code = session()->get('code');
        $user_data = session()->get('user_data');

        $user = User::where('codegene',$code)->where('status_com',0)->first();

        if(!$user){
            session()->flash('warning',"Vous n'êtes pas autorisé, vous avez déjà voté.");
            return view('customs.vote.index');
        } else if ($code && $user_data)  {
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
                session()->put('nom_com',$candidat->nom_prenom);
                $candidat->vote = $candidat->vote + 1;
                $candidat->save();
            }

            session()->flash('success',"Felicitation !!!,Votre vote a ete pris en compte...");
            return redirect()->route('vote.felicitaion');
            //return redirect()->route('customs.vote.felicitaion');
        }
    }

    public function felicitaion(){

        $code = session()->get('code');

        if (!$code) {
            session()->flash('warning',"Cet accès n'est pas autorisé.");
            return view('customs.vote.index');
        }

        $user = User::where('codegene',$code)->where('status',1)->where('status_com',1)->first();

        if($user){
            $nom_commissaire = session()->get('nom_commissaire');
            $nom_commissaire_adjoint = session()->get('nom_commissaire_adjoint');
            session()->flash('success',"Felicitation !!!, vous avez bien vote le commissaire au compte $nom_commissaire le commissaire au compte adjoint $nom_commissaire_adjoint...");
            return view('customs.vote.felicitaion');
        }

        $user_cadjoint = User::where('codegene',$code)->where('status',1)->first();

        if($user_cadjoint){
            $nom_commissaire_adjoint = session()->get('nom_commissaire_adjoint');
            session()->flash('success',"Felicitation !!!,Vous avez bien vote le commissaire au compte adjoint $nom_commissaire_adjoint...");
        }

        $user_com = User::where('codegene',$code)->where('status_com',1)->first();

        if($user_com){
            $nom_commissaire = session()->get('nom_commissaire');
            session()->flash('success',"Felicitation !!!,Vous avez bien vote le commissaire au compte $nom_commissaire...");
        }

        return view('customs.vote.felicitaion');
    }

    public function votrechoix(){

        $code = session()->get('code');
        if (!$code) {
            session()->flash('warning',"Cet accès n'est pas autorisé. Veuillez remplir les informations c-dessous !!!");
            return view('customs.vote.index');
        }

        $user_cadjoint = User::where('codegene',$code)->where('status',1)->first();

        if($user_cadjoint){
            $nom_comadjoint = session()->get('nom_comadjoint');
            session()->flash('success',"Felicitation !!!,Vous avez bien vote le commissaire adjoint $nom_comadjoint...");
        }

        $user_com = User::where('codegene',$code)->where('status_com',1)->first();

        if($user_com){
            $nom_com = session()->get('nom_com');
            session()->flash('success',"Felicitation !!!,Vous avez bien vote le commissaire $nom_com...");
        }

        return view('customs.vote.choix_vote');
        //return view('voting.choix_vote');
    }
}
