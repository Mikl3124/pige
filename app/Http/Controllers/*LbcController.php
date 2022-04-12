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

        $number = 1 ;
        $next = 0;
        $adress = 'http://51.158.103.243:8002/results?page=1';

        do {
          if ($next) {
            $adress = $next;
          }

        $resp = Http::withHeaders([
          'Content-Type'=> 'application/x-www-form-urlencoded',
          'Authorization'=> 'Token 22df8ef2347543dbdb565c70503af376e67a3d92'
        ])->get($adress);

        $results = $resp->json('results');

        foreach ($results as $result) {
          $ad = new Ad;
          $ad->annonce_id = ($result["annonce_id"]);
          $ad->title = ($result["title"]);
          $ad->price = ($result["price"]);
          $ad->url = ($result["url"]);
          $ad->description = ($result["description"]);
          $ad->urgent = ($result["urgent"]);
          $ad->category_name = ($result["category_name"]);
          $ad->ad_type = ($result["ad_type"]);
          $ad->region = ($result["region"]);
          $ad->departement = ($result["department"]);
          $ad->city = ($result["city"]);
          $ad->postal_code = ($result["postal_code"]);
          $ad->is_exclusive = ($result["is_exclusive"]);
          $ad->first_publication_date = ($result["first_publication_date"]);
          $ad->last_publication_date = ($result["last_publication_date"]);
          $ad->has_phone = ($result["has_phone"]);
          $ad->phone = ($result["phone"]);
          $ad->owner_type = ($result["owner_type"]);
          $ad->owner_name = ($result["owner_name"]);
          $ad->user_id = ($result["user_id"]);
          $ad->real_estate_type = ($result["real_estate_type"]);
          $ad->save();
      }
      $next = $resp->json("next");
    } while ($next);

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
