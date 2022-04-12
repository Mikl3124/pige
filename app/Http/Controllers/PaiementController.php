<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    public function index(Request $request)
    {
        $deptString = $request->departements;
        $deptArray = explode(',', $deptString);

        $departements = Departement::whereIn('departement_code', $deptArray )->get();
        foreach ($departements as $departement) {
          $departement->free = 0;
          $departement->save();
        }

        return view('paiement', compact('departements'));

    }
}
