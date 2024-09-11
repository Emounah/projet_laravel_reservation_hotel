<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{categorie, cleChambre, User, hotel, panier, photo, remise, reservation};
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Support\Facades\Session;
class postClient extends Controller
{
    public function ajoutClient(Request $req)
    {
        $this->validate($req, [
            "nomC" => "required",
            "prenomC" => "required",
            "emailC" => "required | email",
            "contactC" => "required",
            "mdpC" => "required",
            "ConfigMdpC" => "required",
        ]);
        $mdpF = $req->input('mdpC');
        $ConfigMdpF = $req->input('ConfigMdpC');
        if ($mdpF === $ConfigMdpF) {
            $userAdd = new User;
            $userAdd->nom = $req->input('nomC');
            $userAdd->prenom = $req->input('prenomC');
            $userAdd->email = $req->input('emailC');
            $userAdd->contact = $req->input('contactC');
            $userAdd->password =  password_hash($mdpF, PASSWORD_DEFAULT);
            $userAdd->status = "client";
            $userAdd->active = "1";
            $userAdd->save();
            return redirect()->Route('connexion');
        } else {
            return back()->with('errors', 'Votre mot de passe est incorrect');
        }
    }

    public function SaveInformation(Request $req)
    {
        $this->validate($req, [
            "id_user" => "required",
            "nom" => "required",
            "prenom" => "required",
            "email" => "required",
            "contact" => "required",
        ]);

        $id = intval($req->input('id_user'));
        $clientM = DB::table('Users')->where('id_user', $id)->Update(['nom' => $req->input('nom'), 'prenom' => $req->input('prenom'), 'email' => $req->input('email'), 'contact' => $req->input('contact'), 'id_user' => $id]);
        $client = User::where('id_user', $id)->first();
        Session::put('client', $client);
        return redirect()->Route('aboutClient',['id' => Session::get('client')->id_user ])->with("errors','Votre modification est enregistrer avec succé");
    }

    public function SavePasswordClient(Request $req)
    {
        $this->validate($req, [
            "id_user" => "required",
            "password" => "required",
            "new_password" => "required",
            "new_config_password" => "required",
        ]);
        $new_password = $req->input('new_password');
        $new_config_password = $req->input('new_config_password');
        $id = intval($req->input('id_user'));
        $client = User::where('id_user', $id)->first();
        if (password_verify($req->input('password'), $client->password)) {
            if ($new_password === $new_config_password) {
                $clientM = DB::table('Users')->where('id_user', $id)->Update(['password' => password_hash($new_password, PASSWORD_DEFAULT)]);
                return back()->with('errors', 'Votre mot de passe est enregistrer avec succé!');
            } else {
                return back()->with('errors', 'Votre nouveau mot de passe est un incorrect!');
            }
        } else {
            return back()->with('errors', 'Votre mot de passe actuel est un incorrect!');
        }
    }


    public function ajoutCommande(Request $req)
    {
        if (Session::has('client')){
            $this->validate($req, [
                "date_debut" => "required",
                "date_fin" => "required",
                "heureSimple" => "required",
                "numeroCle" => "required",
                "prixTotalSimple" => "required",
                "id_hotel" => "required"
            ]);

            $tabResevation = [
                $req->input('date_debut'),
                $req->input('date_fin'),
                $req->input('heureSimple'),
                $req->input('numeroCle'),
                $req->input('prixTotalSimple'),
                $req->input('id_hotel'),
                Session::get('client')->id_user
            ];
            $nomPreno = Session::get('client')->nom.''.Session::get('client')->prenom;
            $paniers = [
                $nomPreno,
                $req->input('numeroCle'),
                $req->input('prixTotalSimple'),
                Session::get('client')->id_user
            ];
            $cle = $req->input('id_cle_chambre');
            $tabCle = explode('-',$cle);
                Session::put('tabCle',$tabCle);
                Session::put('tabResevation', $tabResevation);
                Session::put('paniers',$paniers);

                return redirect()->Route('paymentClient');
        }else{
            return redirect()->Route('connexion');
        }
    }


    public function ajoutResevationClientPayer(Request $req)
    {
        // dd(Session::get('tabInfoF'));
        $this->validate($req, [
            "prenom" => "required",
            "nom" => "required",
            "adresse" => "required",
            "stripeToken" => "required",

        ]);
        $insertion = false;
        $token = $req->input("stripeToken");
        if (!Session::has('tabResevation') || !Session::has('paniers') || !Session::has('tabCle')) {
            return redirect()->Route('detail_hotel',['id' => $req->input('id_hotel')])->with('errors', 'Votre panier est vide');
        }

        Stripe::setApiKey('sk_test_51MsiE8JzTh5SguAcMuWA5BQ6eXLPosdomRE573VYgV01pqgDdjNokFjYqmv6BqSNWSyWoRY1wtUqy6vReI6uuizo00pvpmHXR7'); //clé privée no atao eto
        try {
            $charge = Charge::create(array(
                "amount" =>  Session::get('tabResevation')[4],
                "currency" => "usd",
                "source" => $token,
                "description" => "Teste Paiment avec laravel"
            ));
            $insertion = true;
        } catch (\Exception $e) {
            $insertion = false;
            return redirect()->Route('paymentClient')->with('error', $e->getMessage());
        }
        $nbr_cle= Session('tabCle');
        $length = count($nbr_cle);
        $nbr_cle_ch = $length-1;
        if ($insertion) {
           $reservationAdd = new reservation;
           $reservationAdd->id_user = Session::get('tabResevation')[6];
           $reservationAdd->id_hotel = Session::get('tabResevation')[5];
           $reservationAdd->date_debut = Session::get('tabResevation')[0];
           $reservationAdd->date_fin = Session::get('tabResevation')[1];
           $reservationAdd->nbr_chambre = $nbr_cle_ch;
           $reservationAdd->prix = Session::get('tabResevation')[4];
           $reservationAdd->heure = Session::get('tabResevation')[2];
           $reservationAdd->active = "1";
           $reservationAdd->save();

           $panierAdd = new panier;
           $panierAdd->nom_client = Session::get('paniers')[0];
           $panierAdd->n_chambre = Session::get('paniers')[1];
           $panierAdd->prix = Session::get('paniers')[2];
           $panierAdd->id_user = Session::get('paniers')[3];
           $panierAdd->save();

           $cle_chambresTous = DB::table('cle_chambres')->get();
            for ($i=1; $i < $length; $i++) {
               foreach ($cle_chambresTous as $cle_chambresTou) {
                if ($cle_chambresTou->id_cle_chambre === intval($nbr_cle[$i])) {
                    $cle_chambresTousM = DB::table('cle_chambres')->where('id_cle_chambre', intval($nbr_cle[$i]))->Update(['active' => "0"]);
                }
               }

            }
            Session::forget('tabResevation');
            Session::forget('paniers');
            Session::forget('tabCle');
            return redirect()->Route('aboutClient',['id' => Session::get('client')->id_user])->with('errors', 'Votre Reservation est enregistrer');

        }
    }
}
