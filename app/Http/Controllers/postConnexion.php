<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\{User};

use Illuminate\Support\Facades\Session;

class postConnexion extends Controller
{
        // se connecter
        public function conecter (Request $req){
            $this->validate($req,[
                'email'=>'email|required',
                'password'=>'required|min:3',
            ]);
            $client = User::where('email',$req->input('email'))->first();
            // return dd($client->password);
            if ($client) {
                if(password_verify($req->input('password'), $client->password)){
                    Session::put('client',$client);
                    if ($client->status==="fournisseur") {
                        return redirect()->Route('fournisseur_index');
                    }elseif ($client->status==="client") {
                        return redirect()->Route('indixClient');
                    }elseif ($client->status==="admin"){
                        return redirect()->Route('admin_index');
                    }
                }
                else{
                    return back()->with('errors','Votre mot de passe est incorrect !');
                }
            } else {
                return back()->with("errors','Desolé, vous n'avez pas encore un compte");
            }
        }
}
