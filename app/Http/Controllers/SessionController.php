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

    public function sms(){
       // $telephone = '2250759595939';
        $telephone = '2250759595939';
        $messages = 'Hello world';

        //$response = InfobipSms::send('00225'.$user->telephone, 'Bonjour '. $user->name.' CODE : '. $user->codegene.' LIEN :'. route('session.showverifcode'));
        //Mail::to($user->email)->send(new EmailGenerationCode($user));
       // $response = $this->SendAroliSms($telephone,$messages);
       // $response = $this->smsLetexto($telephone,$messages);
        //$response = $this->smsNew($telephone,$messages);
        $response = $this->leSMS($telephone,$messages);
        //$response = InfobipSms::send($telephone, 'Bonjour DIALLO CODE : RGU8899 LIEN :'. route('session.showverifcode'));

        dd($response);
    }



    public function leSMS($telephone,$message)
    {
        $baseurl = "https://api.letexto.com";

        $curl = curl_init();
        $datas = [
            'step' => NULL,
            'sender' => 'MA-AEJ',
            'name' => 'MA-AEJ',
            'campaignType' => 'SIMPLE',
            'recipientSource' => 'CUSTOM',
            'groupId' => NULL,
            'filename' => NULL,
            'saveAsModel' => false,
            'destination' => 'NAT_INTER',
            'message' => $message,
            'emailText' => NULL,
            'recipients' =>
                [
                    [
                        'phone' => $telephone,
                    ],
                ],
            'sendAt' => [],
            'dlrUrl' => 'http://dlr.my.domain.com',
            'responseUrl' => 'http://res.my.domain.com',
        ];
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.letexto.com/v1/campaigns',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($datas),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer 9be47ae3f22af6ec729fc1e04967a1',
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $json = json_decode($response, true);
     //   echo $json['id'];
        $this->sendMessage($json['id']);
    }

    public function sendMessage($identifier){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.letexto.com/v1/campaigns/'.$identifier.'/schedules',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer 9be47ae3f22af6ec729fc1e04967a1'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
      //  echo $response;
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
            $telephone = '225'.$user->telephone;
            $messages = 'Bonjour '. $user->name.' CODE : '. $user->codegene.' LIEN :'. route('session.showverifcode');

            //$response = InfobipSms::send('00225'.$user->telephone, 'Bonjour '. $user->name.' CODE : '. $user->codegene.' LIEN :'. route('session.showverifcode'));
            //Mail::to($user->email)->send(new EmailGenerationCode($user));
            //$response = $this->SendAroliSms($messages,$telephone);
            $response = $this->leSMS($telephone,$messages);
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

    public function  smsLetexto($telephone,$message){
        $curl = curl_init();
        $datas= [
            'step' => NULL,
            'sender' => 'MA-AEJ',
            'name' => 'test',
            'campaignType' => 'SIMPLE',
            'recipientSource' => 'CUSTOM',
            'groupId' => NULL,
            'filename' => NULL,
            'saveAsModel' => false,
            'destination' => 'NAT_INTER',
            'message' => $message,
            'emailText' => NULL,
            'recipients' =>
                [
                    [
                        'phone' => $telephone,
                    ],
                ],
            'sendAt' => [],
            'dlrUrl' => 'http://dlr.my.domain.com',
            'responseUrl' => 'http://res.my.domain.com',
        ];
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://api.letexto.com/v1/campaigns',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>json_encode($datas),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer tknHtdqysZYuKsG58VtP1z80C2tsi6',
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response);
    }

    public static function SendAroliSms($phone,$message)
    {
        $message  =rawurlencode($message);
        $tel = '225'.$phone;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://www.letexto.com/send_message/user/ignace.asseke@cikdo.ci/secret/zgY*hM75+tDVL2SO0QF01IRtZUoHg50H+WIhxD*w/msg/$message/receiver/$tel/sender/Porteur2Vie/cltmsgid/1",
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

        var_dump($response);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }

    public function smsNew($telephone,$message){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://campaigns.nerhysms.com/api/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
            "to": '.$telephone.',
            "from": "MA-AEJ",
            "content": '.$message.'
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer 404774749c82713e38d1da4002'
            )
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
}
