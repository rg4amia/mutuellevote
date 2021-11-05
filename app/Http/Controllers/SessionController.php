<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\EmailGenerationCode;
use App\Models\User;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class SessionController extends Controller
{
    use ThrottlesLogins;

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function obtenircode()
    {
        return view('voting.index');
    }

    public function generatecode(){
        $data = \request()->all();

        $messages = [
            'required' => 'Le champ :attribute est obligatoire',
        ];

        $data_src = [
            'email' => 'required|string',
            'telephone' => 'required|string',
        ];

        $validator = Validator::make($data, $data_src, $messages);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $user = User::where(['email' => request(['email']), 'telephone' => request(['telephone']) ])->first();

        if(!$user){
            session()->flash('warning','Aucun compte ne correspond à cet utilisateur. Veuillez contacter l\'administrateur');
            return back();
        } else {

            $user1 =  User::where(['email' => request(['email']), 'telephone' => request(['telephone'])])->where('codegene',null)
                ->first();
            if (!$user1) {
                session()->flash('warning','Code deja disponible');
                return back();
            }

            $user->codegene = Str::random(32);
            $user->save();
           // Mail::to($user->email)->send(new EmailGenerationCode($user));
            session()->flash('success','Code generer avec success');
            return redirect()->route('session.showverifcode');
        }

    }

    public function showverifcode(){
        return view('voting.verifcode');
    }

    public function verifcode(Request $request){
        $data = \request()->all();

        $messages = [
            'required' => 'Le champ :attribute est obligatoire',
        ];

        $data_src = [
            'codegene' => 'required|string',
        ];

        $validator = Validator::make($data, $data_src, $messages);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $user = User::where('codegene', request(['codegene']))->first();

        if(!$user){
            session()->flash('warning','le code ne correspond a aucun utilisateur');
            return back();
        } else {
            session()->put('code',$user->codegene);
            //return redirect()->route('vote.index');
            return redirect()->route('vote.votrechoix');
        }
    }


    public function login()
    {
        $data = \request()->all();

        $messages = [
            'required' => 'Le champ :attribute est obligatoire',
        ];

        $data_src = [
            'email' => 'required|string',
            'password' => 'required|string',
        ];

        $validator = Validator::make($data, $data_src, $messages);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $user = User::where('email', request(['email']))->first();

        if(!$user){
            session()->flash('warning','Aucun compte ne correspond à cet utilisateur. Veuillez contacter l\'administrateur');
            return back();
        }

        $data = request(['email', 'password']);

        if(!auth()->attempt($data)){
            session()->flash('warning','Votre adresse électronique ou votre mot de passe est incorrecte');
            return back();
        }
        return redirect()->home();
    }

    public function destroy()
    {
        $this->guard()->logout();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect()->login();
    }

    public function recovery()
    {
        return view('session.recovery');
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
