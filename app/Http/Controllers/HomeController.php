<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Departement;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

    public function card()
    {
      $booking_dpt = Departement::where('free', 0)->get();
      $not_free_dpt = [];

      foreach ($booking_dpt as $departement) {
        array_push($not_free_dpt, $departement->departement_code);
      }

      return view('card', compact('not_free_dpt'));
    }
}
