<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaiementController extends Controller
{
    public function index(Request $request)
    {
        $deptString = $request->departements;
        $deptArray = explode(',', $deptString);

        dd($deptArray);
    }
}
