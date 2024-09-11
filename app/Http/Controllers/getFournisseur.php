<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class getFournisseur extends Controller
{
    public function fournisseur_index(){
        return view('viewFournisseur.welcome');
    }
    public function ajout_cle_payment(){
        return view('viewFournisseur.ajout_cle_payment');
    }
    public function ajout_employe(){
        return view('viewFournisseur.ajout_emplye');
    }
    public function ajout_fonction(){
        return view('viewFournisseur.ajout_fonction');
    }
    public function ajout_payment(){
        return view('viewFournisseur.ajout_payment');
    }
    public function ajout_products($id){
        $hotels = DB::table('hotels')->where('id_user',$id)->first();
        if ($hotels) {
        $categories = DB::table('categories')->where('id_hotel',$hotels->id_hotel)->get();
        $categoriesSimple = DB::table('categories')->where('id_hotel',$hotels->id_hotel)->where('categorie','SIMPLE')->first();
        $categoriesVip = DB::table('categories')->where('id_hotel',$hotels->id_hotel)->where('categorie','VIP')->first();
        return view('viewFournisseur.ajout_products',compact('hotels','categories','categoriesSimple','categoriesVip'));
        }else{
            return view('viewFournisseur.ajout_products',compact('hotels'));
        }
    }
    public function liste_cle_payment(){
        return view('viewFournisseur.liste_cle_payment');
    }
    public function liste_employe(){
        return view('viewFournisseur.liste_employe');
    }

    public function liste_fonction(){
        return view('viewFournisseur.liste_fonction');
    }
    public function liste_payment($id){
        $hotels = DB::table('hotels')->where('id_user',$id)->first();
        if ($hotels) {
            $payment_fournisseurs = DB::table('payment_fournisseurs')->where('id_hotel',$hotels->id_hotel)->get();
            return view('viewFournisseur.liste_payment',compact('hotels','payment_fournisseurs'));
        }else{
            return view('viewFournisseur.liste_payment');
        }
    }
    public function liste_products($id){
        $hotels = DB::table('hotels')->where('id_user',$id)->first();
        if ($hotels) {
        $categories = DB::table('categories')->where('id_hotel',$hotels->id_hotel)->get();
        $remises = DB::table('remises')->join('categories', 'categories.id_cat', '=', 'remises.id_cat')->join('hotels', 'hotels.id_hotel', '=', 'categories.id_hotel')->where('hotels.id_hotel', $hotels->id_hotel)->get();
        $photoSimples = DB::table('photos')->join('categories', 'categories.id_cat', '=', 'photos.id_cat')->join('hotels', 'hotels.id_hotel', '=', 'categories.id_hotel')->where('hotels.id_hotel', $hotels->id_hotel)->get();
        $photos = DB::table('photos')->get();
        $cle_chambres = DB::table('cle_chambres')->join('categories', 'categories.id_cat', '=', 'cle_chambres.id_cat')->join('hotels', 'hotels.id_hotel', '=', 'categories.id_hotel')->where('hotels.id_hotel', $hotels->id_hotel)->get();
        $cle_chambresGet = DB::table('cle_chambres')->get();

            return view('viewFournisseur.liste_products' ,compact('hotels','categories','remises','photoSimples','photos','cle_chambres','cle_chambresGet'));
        }else{

            return view('viewFournisseur.liste_products' ,compact('hotels'));
        }

    }
    public function panier($id){
        $hotels = DB::table('hotels')->where('id_user',$id)->first();
        if ($hotels) {
            $reservations = DB::table('reservations')->join('users', 'users.id_user', '=', 'reservations.id_user')->join('hotels', 'hotels.id_hotel', '=', 'reservations.id_hotel')->where('hotels.id_hotel', $hotels->id_hotel)->get();
            $reservationsTous = DB::table('reservations')->get();
            return view('viewFournisseur.panier',compact('hotels','reservations','reservationsTous'));
        }else{
            return view('viewFournisseur.panier');
        }
    }
    public function reservation(){
        return view('viewFournisseur.reservation');
    }

    public function edite_profile(){
        return view('viewFournisseur.edite_profile');
    }

    public function hotel_edite($id){
        $hotels = DB::table('hotels')->where('id_hotel',$id)->first();
        return view('viewFournisseur.hotel_edite',compact('hotels'));
    }
}
