<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LbcController extends Controller
{

  public function index(Request $request)
  {

    for ($i = 1; $i <= 96; $i++) {
      $next = 0;

      do {
        $args = [
          'departement' => $i,
          'categorie' => $request->categorie,
          'type' => "particulier",
          'since' => $request->date,
          'with_phone_only' => "true",
        ];

        if ($next) {
          sleep(2);
          $args['from_index'] = $next;
        }

        sleep(2);
        $resp = Http::withHeaders([
          'X-RapidAPI-Host' => 'immobilier-leboncoin.p.rapidapi.com',
          'X-RapidAPI-Key' => '296280c4bcmsh387388f442e2ef1p1769b8jsneec3c54215b8'
        ])->get('https://immobilier-leboncoin.p.rapidapi.com/api/v1/annonces', $args);

        $results = $resp->json("ads");

        foreach ($results as $result) {
          $ad = new Ad;
          $ad->created_at = $result["original_ad"]["first_publication_date"];
          $ad->departement = $result["original_ad"]["location"]["zipcode"];
          $ad->title = $result["original_ad"]["subject"];
          $ad->town = $result["original_ad"]["location"]["city"];
          $ad->phone = $result["phone"];
          $ad->categorie = $request->categorie;
          $ad->type = "particulier";
          $ad->list_id = $result["original_ad"]["list_id"];
          $ad->url = $result["original_ad"]["url"];
          if (isset($result["original_ad"]["images"]["thumb_url"])) {
            $ad->image = $result["original_ad"]["images"]["thumb_url"];
          }
          $ad->save();
        }
        $next = $resp->json("next_index");
      } while ($next);
    }

      



      


    //$results = Ad::where('created_at', '>', $request->date)->get();
    //return view('results', ['response' => $results]);
  }



    /**
     * Sends sms to user using Twilio's programmable sms client
     * @param String $message Body of sms
     * @param Number $recipients string or array of phone number of recepient
     */
    public function send(Request $request){
      $account_sid = getenv("TWILIO_SID");
      $auth_token = getenv("TWILIO_AUTH_TOKEN");
      $twilio_number = getenv("TWILIO_NUMBER");
      $client = new Client($account_sid, $auth_token);
      $client->messages->create("+33785659165", [
        'from' => $twilio_number,
        'body' => "message de test"
      ]);

    }
    }
