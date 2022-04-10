<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LbcController extends Controller
{
    public function index(Request $request){

      $response = Http::withHeaders([
        'X-RapidAPI-Host' => 'immobilier-leboncoin.p.rapidapi.com',
        'X-RapidAPI-Key' => 'secret'
    ])->get('https://immobilier-leboncoin.p.rapidapi.com/api/v1/annonces', [
      'departement' => $request->departement,
      'categorie' => $request->categorie,
      'type' => $request->type,
      'since' => $request->date,
      'with_phone_only' => $request->phone,
    ]);
    $results= $response->json("ads");
    foreach ($results as $result) {

      $ad = new Ad;
      $ad->created_at = $result["original_ad"]["first_publication_date"];
      $ad->departement = $result["original_ad"]["location"]["zipcode"];
      $ad->title = $result["original_ad"]["subject"];
      $ad->town = $result["original_ad"]["location"]["city"];
      $ad->phone = $result["phone"];
      $ad->categorie = $request->categorie;
      $ad->type = $request->type;
      $ad->id = $result["original_ad"]["list_id"];
      $ad->url = $result["original_ad"]["url"];
      if (isset($result["original_ad"]["images"]["thumb_url"])){
        $ad->image = $result["original_ad"]["images"]["thumb_url"];
      }
      $ad->save();
    }

    if ($response->json("next_index")){
      sleep(1.2);
      $response1 = Http::withHeaders([
        'X-RapidAPI-Host' => 'immobilier-leboncoin.p.rapidapi.com',
        'X-RapidAPI-Key' => 'secret'
    ])->get('https://immobilier-leboncoin.p.rapidapi.com/api/v1/annonces', [
      'departement' => $request->departement,
      'categorie' => $request->categorie,
      'type' => $request->type,
      'since' => $request->date,
      'with_phone_only' => $request->phone,
      'from_index' => $response->json("next_index"),
    ]);
      $results = $response1->json("ads");
      foreach ($results as $result) {
        $ad = new Ad;
        $ad->created_at = $result["original_ad"]["first_publication_date"];
        $ad->departement = $result["original_ad"]["location"]["zipcode"];
        $ad->title = $result["original_ad"]["subject"];
        $ad->town = $result["original_ad"]["location"]["city"];
        $ad->phone = $result["phone"];
        $ad->categorie = $request->categorie;
        $ad->type = $request->type;
        $ad->id = $result["original_ad"]["list_id"];
        $ad->url = $result["original_ad"]["url"];
        if (isset($result["original_ad"]["images"]["thumb_url"])) {
          $ad->image = $result["original_ad"]["images"]["thumb_url"];
        }
        $ad->save();
      }
    }else{
      $results = Ad::where('created_at', '>', $request->date)->get();
      
      return view('results', ['response' => $results]);
    }
    if ($response1->json("next_index")) {
      sleep(1.2);
      $response2 = Http::withHeaders([
        'X-RapidAPI-Host' => 'immobilier-leboncoin.p.rapidapi.com',
        'X-RapidAPI-Key' => 'secret'
      ])->get('https://immobilier-leboncoin.p.rapidapi.com/api/v1/annonces', [
        'departement' => $request->departement,
        'categorie' => $request->categorie,
        'type' => $request->type,
        'since' => $request->date,
        'with_phone_only' => $request->phone,
        'from_index' => $response1->json("next_index"),
      ]);
      $results = $response2->json("ads");
      foreach ($results as $result) {
        $ad = new Ad;
        $ad->created_at = $result["original_ad"]["first_publication_date"];
        $ad->departement = $result["original_ad"]["location"]["zipcode"];
        $ad->title = $result["original_ad"]["subject"];
        $ad->town = $result["original_ad"]["location"]["city"];
        $ad->phone = $result["phone"];
        $ad->categorie = $request->categorie;
        $ad->type = $request->type;
        $ad->id = $result["original_ad"]["list_id"];
        $ad->url = $result["original_ad"]["url"];
        if (isset($result["original_ad"]["images"]["thumb_url"])) {
          $ad->image = $result["original_ad"]["images"]["thumb_url"];
        }
        $ad->save();
      }
    } else {
      $results = Ad::where('created_at', '>', $request->date)->get();
      
      return view('results', ['response' => $results]);
    }

      if ($response2->json("next_index")) {
        sleep(1.2);
        $response3 = Http::withHeaders([
          'X-RapidAPI-Host' => 'immobilier-leboncoin.p.rapidapi.com',
          'X-RapidAPI-Key' => 'secret'
        ])->get('https://immobilier-leboncoin.p.rapidapi.com/api/v1/annonces', [
          'departement' => $request->departement,
          'categorie' => $request->categorie,
          'type' => $request->type,
          'since' => $request->date,
          'with_phone_only' => $request->phone,
          'from_index' => $response2->json("next_index"),
        ]);
        $results = $response3->json("ads");
        foreach ($results as $result) {
          $ad = new Ad;
          $ad->created_at = $result["original_ad"]["first_publication_date"];
          $ad->departement = $result["original_ad"]["location"]["zipcode"];
          $ad->title = $result["original_ad"]["subject"];
          $ad->town = $result["original_ad"]["location"]["city"];
          $ad->phone = $result["phone"];
          $ad->categorie = $request->categorie;
          $ad->type = $request->type;
          $ad->id = $result["original_ad"]["list_id"];
          $ad->url = $result["original_ad"]["url"];
        if (isset($result["original_ad"]["images"]["thumb_url"])) {
          $ad->image = $result["original_ad"]["images"]["thumb_url"];
        }
          $ad->save();
        }
      } else {
      $results = Ad::where('created_at', '>', $request->date)->get();
      
      return view('results', ['response' => $results]);
    }

      if ($response3->json("next_index")) {
        sleep(1.2);
        $response4 = Http::withHeaders([
          'X-RapidAPI-Host' => 'immobilier-leboncoin.p.rapidapi.com',
          'X-RapidAPI-Key' => 'secret'
        ])->get('https://immobilier-leboncoin.p.rapidapi.com/api/v1/annonces', [
          'departement' => $request->departement,
          'categorie' => $request->categorie,
          'type' => $request->type,
          'since' => $request->date,
          'with_phone_only' => $request->phone,
          'from_index' => $response3->json("next_index"),
        ]);
        $results = $response4->json("ads");
        foreach ($results as $result) {
          $ad = new Ad;
          $ad->created_at = $result["original_ad"]["first_publication_date"];
          $ad->departement = $result["original_ad"]["location"]["zipcode"];
          $ad->title = $result["original_ad"]["subject"];
          $ad->town = $result["original_ad"]["location"]["city"];
          $ad->phone = $result["phone"];
          $ad->categorie = $request->categorie;
          $ad->type = $request->type;
          $ad->id = $result["original_ad"]["list_id"];
          $ad->url = $result["original_ad"]["url"];
        if (isset($result["original_ad"]["images"]["thumb_url"])) {
          $ad->image = $result["original_ad"]["images"]["thumb_url"];
        }
          $ad->save();
        }
      } else {
      $results = Ad::where('created_at', '>', $request->date)->get();
      
      return view('results', ['response' => $results]);
    }

      if ($response4->json("next_index")) {
        sleep(1.2);
        $response5 = Http::withHeaders([
          'X-RapidAPI-Host' => 'immobilier-leboncoin.p.rapidapi.com',
          'X-RapidAPI-Key' => 'secret'
        ])->get('https://immobilier-leboncoin.p.rapidapi.com/api/v1/annonces', [
          'departement' => $request->departement,
          'categorie' => $request->categorie,
          'type' => $request->type,
          'since' => $request->date,
          'with_phone_only' => $request->phone,
          'from_index' => $response4->json("next_index"),
        ]);
        $results = $response5->json("ads");

        foreach ($results as $result) {
          $ad = new Ad;
          $ad->created_at = $result["original_ad"]["first_publication_date"];
          $ad->departement = $result["original_ad"]["location"]["zipcode"];
          $ad->title = $result["original_ad"]["subject"];
          $ad->town = $result["original_ad"]["location"]["city"];
          $ad->phone = $result["phone"];
          $ad->categorie = $request->categorie;
          $ad->type = $request->type;
          $ad->id = $result["original_ad"]["list_id"];
          $ad->url = $result["original_ad"]["url"];
        if (isset($result["original_ad"]["images"]["thumb_url"])) {
          $ad->image = $result["original_ad"]["images"]["thumb_url"];
        }
          $ad->save();
        }
      } else {
      $results = Ad::where('created_at', '>', $request->date)->get();
      
      return view('results', ['response' => $results]);
    }
    $results = Ad::where('created_at', '>', $request->date)->get();
    
    return view('results', ['response' => $results]);


    //dd($response->json());
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
