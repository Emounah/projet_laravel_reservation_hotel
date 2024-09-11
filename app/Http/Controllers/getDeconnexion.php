<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class getDeconnexion extends Controller
{
    public function deconnexion(){
        Session::forget('client');
            Session::forget('tabResevation');
            Session::forget('paniers');
            Session::forget('tabCle');
        return redirect()->Route('connexion');
    }
}
