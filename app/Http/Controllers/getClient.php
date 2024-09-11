<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{hotel};

class getClient extends Controller
{
    public function indixClient(){
        $userHotels = DB::table('users')->join('hotels', 'hotels.id_user', '=', 'users.id_user')->join('categories', 'categories.id_hotel', '=', 'hotels.id_hotel')->get();
        $Hotels = DB::table('hotels')->get();
        $remises = DB::table('remises')->get();
        $userRemise = DB::table('remises')->join('categories', 'categories.id_cat', '=', 'remises.id_cat')->join('hotels', 'hotels.id_hotel', '=', 'categories.id_hotel')->get();
        return view('viewClient.welcome',compact('userHotels','Hotels','remises','userRemise'));
    }
    public function aboutClient($id){
        $userReservers = DB::table('reservations')->join('hotels','hotels.id_hotel','=','reservations.id_hotel')->join('users','users.id_user','=','reservations.id_user')->where('users.id_user',$id)->get();
        $reservations = DB::table('reservations')->get();
        return view('viewClient.aboutClient',compact('userReservers','reservations'));
    }
    public function connexion(){
        return view('viewClient.connexion');
    }
    public function detail_hotel($id){
        $userHotels = DB::table('users')->join('hotels', 'hotels.id_user', '=', 'users.id_user')->where('hotels.id_hotel',$id)->first();
        $categorie = DB::table('categories')->join('hotels','hotels.id_hotel','=','categories.id_hotel')->where('categories.id_hotel',$userHotels->id_hotel)->get();
        $remises = DB::table('remises')->join('categories','categories.id_cat','=','remises.id_cat')->where('categories.id_hotel',$userHotels->id_hotel)->get();
        $cleChambre = DB::table('cle_chambres')->orderBy('cle_numero','asc')->join('categories','categories.id_cat','=','cle_chambres.id_cat')->where('categories.id_hotel',$userHotels->id_hotel)->get();
        $photos = DB::table('photos')->get();
        $cle_chambresTous = DB::table('cle_chambres')->get();
        $reservations = DB::table('reservations')->get();
        return view('viewClient.detail_hotel',compact('userHotels','categorie','remises','cleChambre','photos','cle_chambresTous','reservations'));
    }
    public function inscription(){
        return view('viewClient.inscription');
    }
    public function inscriptionFournisseur(){
        return view('viewClient.inscriptionFournisseur');
    }
    public function paymentClient(){
        return view('viewClient.PaymentClient');
    }
    public function paymentFournisseur(){
        return view('viewClient.paymentFournisseur');
    }

    // public function Searching(Request $req){
    //     $this->validate($req,[
    //         'keyword'=>'required',
    //         'keyword2'=>'required',
    //     ]);

    //     $key = $req->input("keyword");
    //     $key2 = $req->input("keyword2");

    //     $hotel = hotel::whereAny(
    //         ["id","ville","nom_hotel"],"LIKE","%{$key}%")->paginate(3)->withPath("?keyword=".$key);
    //         $nb =$hotel->total() ;
    //         // dd($article);

    //     return view("resultat",compact("article","nb"));
    // }
}
