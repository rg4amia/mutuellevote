<?php

namespace App\Services;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Twilio\Rest\Client as TwilioClient;

class WhatsappService
{

    protected $twilio;

    public function __construct()
    {
        //$this->client = new Client(['base_uri' => 'https://web.whatsapp.com']);
        $this->twilio = new TwilioClient(config('services.twilio.sid'), config('services.twilio.token'));
    }

    public function sendMessage($number, $message)
    {

        $number = $number;
        $message = $message;

        $url = "https://api.whatsapp.com/send";

        $query = [
            'phone' => $number,
            'text' => $message
        ];

        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', $url, [
            'query' => $query
        ]);

        ///dd($response);
        return response()->json(['status' => 'message sent']);
    }

    public function sendMessageOld($number, $message, $datetime)
    {

     /*    // Validation
        if (!preg_match('/^[0-9]{10}$/', $number)) {
            throw new Exception('Numéro invalide');
        }
 */
        if (!$datetime instanceof \DateTime) {
            throw new Exception('Date invalide');
        }

        // Ouvrir WhatsApp Web
        try {
            $res = $this->client->request('GET', '/');
        } catch (Exception $e) {
            // Log l'erreur
            return;
        }

        // Attendre le chargement
        //sleep(10);

        // Sélectionner le destinataire
        $payload = [
            'phone' => $number
        ];

        $res = $this->client->post('/send', ['form_params' => $payload]);

        // Saisir le message
        $payload = [
            'message' => $message
        ];

        dd($res);

        $this->client->post('/message/insert', ['form_params' => $payload]);

        // Calculer le délai avant envoi
       // $delay = $datetime->getTimestamp() - time();

        // Attendre avant d'envoyer
        //sleep($delay);

        // Envoyer
        $this->client->post('/send');

        // Logs
        logger('Message envoyé à ' . $number);
    }
}
