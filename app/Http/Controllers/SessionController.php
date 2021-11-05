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
use Pnlinh\InfobipSms\Facades\InfobipSms;

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
                return redirect()->route('vote.felicitaion');
                //return back();
            }

            //$user->codegene = Str::random(32);
            $user->codegene = random_int(100000, 999999);
            $user->save();
            $telephone = '00225'.$user->telephone;
            $messages = 'Bonjour '. $user->name.' CODE : '. $user->codegene.' LIEN :'. route('session.showverifcode');

            //$response = InfobipSms::send('00225'.$user->telephone, 'Bonjour '. $user->name.' CODE : '. $user->codegene.' LIEN :'. route('session.showverifcode'));
            //Mail::to($user->email)->send(new EmailGenerationCode($user));
            $response = $this->SendAroliSms($messages,$telephone);
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

    private function SendAroliSms($message,$phone)
    {

        $message  =rawurlencode($message);
        $tel = $phone;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://www.letexto.com/send_message/user/ignace.asseke@cikdo.ci/secret/zgY*hM75+tDVL2SO0QF01IRtZUoHg50H+WIhxD*w/msg/$message/receiver/$tel/sender/CASH-INVEST/cltmsgid/1",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST =>"GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err)
        {
            return "cURL Error #:" . $err;
        }
        else
        {
            return $response;
        }


    }
}
