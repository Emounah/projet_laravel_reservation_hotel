<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Laravel\Cashier\Facades\Cashier;

use App\Models\{categorie, cleChambre, User, hotel, photo, remise};
use Stripe\Stripe;
use Stripe\Charge;
use LaravelLang\Lang\Plugins\Spark\Stripe as SparkStripe;
use Illuminate\Support\Facades\Session;

class postFournisseur extends Controller
{
    public function ajoutFournisseur(Request $req)
    {
        $this->validate($req, [
            "nomF" => "required",
            "prenomF" => "required",
            "emailF" => "required | email",
            "contactF" => "required",
            "mdpF" => "required",
            "ConfigMdpF" => "required",
        ]);
        $mdpF = $req->input('mdpF');
        $ConfigMdpF = $req->input('ConfigMdpF');
        $tabInfoF = [
            $req->input('nomF'),
            $req->input('prenomF'),
            $req->input('emailF'),
            $req->input('contactF'),
            password_hash($mdpF, PASSWORD_DEFAULT),
        ];
        if ($mdpF === $ConfigMdpF) {
            Session::put('tabInfoF', $tabInfoF);
            return redirect()->Route('paymentFournisseur');
        } else {
            return back()->with('error', 'Votre mot de passe est incorrect');
        }
    }

    public function ajoutFournisseurPayer(Request $req)
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
        if (!Session::has('tabInfoF')) {
            return view('viewClient.inscriptionFournisseur')->with('message', 'Votre information est vide');
        }

        Stripe::setApiKey('sk_test_51MsiE8JzTh5SguAcMuWA5BQ6eXLPosdomRE573VYgV01pqgDdjNokFjYqmv6BqSNWSyWoRY1wtUqy6vReI6uuizo00pvpmHXR7'); //clé privée no atao eto
        try {
            $charge = Charge::create(array(
                "amount" => 1000000,
                "currency" => "usd",
                "source" => $token,
                "description" => "Teste Paiment avec laravel"
            ));
            $insertion = true;
        } catch (\Exception $e) {
            $insertion = false;
            return redirect()->Route('paymentFournisseur')->with('error', $e->getMessage());
        }

        if ($insertion) {
            $userAdd = new User;
            $userAdd->nom = Session::get('tabInfoF')[0];
            $userAdd->prenom = Session::get('tabInfoF')[1];
            $userAdd->email = Session::get('tabInfoF')[2];
            $userAdd->contact = Session::get('tabInfoF')[3];
            $userAdd->password = Session::get('tabInfoF')[4];
            $userAdd->status = "fournisseur";
            $userAdd->active = "1";
            $userAdd->save();
            Session::forget('tabInfoF');
            return redirect()->Route('connexion')->with('errors', "Votre information est enregistrer avec succé");
        }
    }


    public function SaveProfile(Request $req)
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
        return redirect()->Route('aboutClient')->with("errors','Votre modification est enregistrer avec succé");
    }

    public function SavePassword(Request $req)
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

    public function ajoutInfoHotel(Request $req)
    {
        $this->validate($req, [
            "nom_hotel" => "required",
            "adresse_hotel" => "required",
            "ville_hotel" => "required",
            "nbr_chambre" => "required",
            "photo" => "required|image|mimes:jpeg,png,jpg,gif",
            "description" => "required",
            "contact" => "required",
            "nbr_etoil" => "required",
            "id_user" => "required",
        ]);
        $HotelExiste = hotel::where('id_user', $req->input('id_user'))->first();
        if (!$HotelExiste) {
            if ($req->hasFile('photo')) {
                $image = $req->file('photo');
                $imageName = time() . '.' . $image->getClientOriginalExtension();

                $hotelAdd = new hotel;
                $hotelAdd->nom_hotel = $req->input('nom_hotel');
                $hotelAdd->adresse_hotel = $req->input('adresse_hotel');
                $hotelAdd->ville = $req->input('ville_hotel');
                $hotelAdd->nbr_chambre = $req->input('nbr_chambre');
                $hotelAdd->photo = $imageName;
                $hotelAdd->description = $req->input('description');
                $hotelAdd->contact = $req->input('contact');
                $hotelAdd->nbr_etoil = $req->input('nbr_etoil');
                $hotelAdd->id_user = $req->input('id_user');
                $hotelAdd->active = '1';
                $hotelAdd->save();
                // Stockez l'image dans le dossier "public/images" en utilisant la méthode storeAs
                $image->storeAs('img_hotel', $imageName, 'public');
                return back()->with('errors', 'Votre donner est enregistrer avec succés');
            }
        } else {
            return back()->with('errors', "Vous devez supprimer l'information existe");
        }
    }

    public function ajoutCategorie(Request $req)
    {
        $this->validate($req, [
            "categorie" => "required",
            "nbr_cle" => "required",
            "prix" => "required",
            "id_hotel" => "required",
        ]);
        $HotelExiste = hotel::where('id_hotel', $req->input('id_hotel'))->first();
        $total_Chambre = $HotelExiste->nbr_chambre;
        $CategorieExiste = categorie::where('categorie', $req->input('categorie'))->where('id_hotel', $req->input('id_hotel'))->first();

        if (intval($req->input('nbr_cle')) <= $total_Chambre) {
            if (!$CategorieExiste) {
                $CatAdd = new categorie;
                $CatAdd->categorie = $req->input('categorie');
                $CatAdd->nbr_cle = $req->input('nbr_cle');
                $CatAdd->prix = $req->input('prix');
                $CatAdd->id_hotel = $req->input('id_hotel');
                $CatAdd->save();
                return back()->with('errors', 'Votre donner est enregistrer avec succés');
            } else {
                return back()->with('errors', "Vous devez supprimer l'information existe");
            }
        } else {
            return back()->with('errors', "Votre Clé de chambra doit compatible le nombre de chambre");
        }
    }

    public function ajoutRemise(Request $req)
    {
        $this->validate($req, [
            "remise" => "required",
            "date_debut" => "required",
            "date_fin" => "required",
            "id_cat" => "required",
        ]);
        $id_hotel = $req->input('id_hotel');
        $RemiseExiste = DB::table('remises')->join('categories', 'categories.id_cat', '=', 'remises.id_cat')->join('hotels', 'hotels.id_hotel', '=', 'categories.id_hotel')->where('hotels.id_hotel', $id_hotel)->where('categories.id_cat', $req->input('id_cat'))->first();
        if (!$RemiseExiste) {
                $remiseAdd = new remise;
                $remiseAdd->remise = $req->input('remise');
                $remiseAdd->date_debut = $req->input('date_debut');
                $remiseAdd->date_fin = $req->input('date_fin');
                $remiseAdd->id_cat = $req->input('id_cat');
                $remiseAdd->save();
                return back()->with('errors', 'Votre donner est enregistrer avec succés');
        } else {
            return back()->with('errors', "Vous devez supprimer l'information existe");
        }

    }


    public function ajoutPhoto(Request $req)
    {
        $this->validate($req, [
            "photo" => "required|image|mimes:jpeg,png,jpg,gif",
            "titre" => "required",
            "description" => "required",
            "id_cat" => "required",
        ]);
        if ($req->hasFile('photo')) {
            $image = $req->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
        $photoAdd = new photo;
        $photoAdd->photo =  $imageName;
        $photoAdd->titre = $req->input('titre');
        $photoAdd->description = $req->input('description');
        $photoAdd->id_cat = $req->input('id_cat');
        $photoAdd->save();
         // Stockez l'image dans le dossier "public/images" en utilisant la méthode storeAs
         $image->storeAs('img_hotel_cat', $imageName, 'public');
        return back()->with('errors', 'Votre donner est enregistrer avec succés');
        }
    }

    public function ajoutCleChambre(Request $req)
    {
        $this->validate($req, [
            "debut_numero" => "required",
            "fin_numero" => "required",
            "id_cat" => "required",
        ]);
        $debut_numero = intval($req->input('debut_numero'));
        $fin_numero = intval($req->input('fin_numero'));
        for ($i=$debut_numero; $i <= $fin_numero; $i++) {
            $cleChambreAdd = new cleChambre;
            $cleChambreAdd->cle_numero = $i;
            $cleChambreAdd->id_cat = $req->input('id_cat');
            $cleChambreAdd->active = "1";
            $cleChambreAdd->save();
        }
        return back()->with('errors', 'Votre donner est enregistrer avec succés');
    }

    public function SaveHotel(Request $req)
    {
        $this->validate($req, [
            "categorie" => "required",
            "nbr_cle" => "required",
            "prix" => "required",
        ]);

        $id = intval($req->input('id_hotel'));
        $photo = $req->file('photo');
        $olo_photo = $req->input('old_photo');

        if (!empty($photo)) {
        if ($req->hasFile('photo')) {
            $image = $req->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $hotelM = DB::table('hotels')->where('id_hotel', $id)->Update(['nom_hotel' => $req->input('nom_hotel'), 'adresse_hotel' => $req->input('adresse_hotel'), 'ville' => $req->input('ville_hotel'), 'nbr_chambre' => $req->input('nbr_chambre'),'photo' => $imageName,'description' => $req->input('description'),'contact' => $req->input('contact'),'nbr_etoil' => $req->input('nbr_etoil')]);
            $image->storeAs('img_hotel', $imageName, 'public');
            unlink("storage/img_hotel/".$olo_photo);
            return redirect()->Route('liste_products',['id' => Session::get('client')->id_user ])->with("errors','Votre modification est enregistrer avec succé");
        }else{
            return back()->with('errors', 'Il y a de probléme dans le photo que vous avez inserer!');
        }
        }else{
            $hotelM = DB::table('hotels')->where('id_hotel', $id)->Update(['nom_hotel' => $req->input('nom_hotel'), 'adresse_hotel' => $req->input('adresse_hotel'), 'ville' => $req->input('ville_hotel'), 'nbr_chambre' => $req->input('nbr_chambre'),'photo' => $olo_photo,'description' => $req->input('description'),'contact' => $req->input('contact'),'nbr_etoil' => $req->input('nbr_etoil')]);
            return redirect()->Route('liste_products',['id' => Session::get('client')->id_user ])->with("errors','Votre modification est enregistrer avec succé");
        }

    }

    public function supprCategory($id){
        $categorySuppre = DB::table('categories')->where('id_cat',$id)->delete();
        return redirect()->Route('liste_products',['id' => Session::get('client')->id_user ])->with("errors','Votre donnée est supprimer avec succé");
    }

    public function ModifCategorie($id){
        $categoriesM=DB::table('categories')->where('id_cat',$id)->first();
        // dd($sizeM);
        return view('viewFournisseur.categorie_edite',compact('categoriesM'));
    }

    public function SaveCategorie(Request $req)
    {
        $this->validate($req, [
            "categorie" => "required",
            "nbr_cle" => "required",
            "prix" => "required",
        ]);

        $id = intval($req->input('id_cat'));

        $CategorieMSave = DB::table('categories')->where('id_cat', $id)->Update(['categorie' => $req->input('categorie'), 'nbr_cle' => $req->input('nbr_cle'), 'prix' => $req->input('prix')]);
         return redirect()->Route('liste_products',['id' => Session::get('client')->id_user ])->with("errors','Votre modification est enregistrer avec succé");

    }

    public function supprRemise($id){
        $remiseSuppre = DB::table('remises')->where('id_remise',$id)->delete();
        return redirect()->Route('liste_products',['id' => Session::get('client')->id_user ])->with("errors','Votre donnée est supprimer avec succé");
    }

    public function ModifRemise($id){
        $remisesM=DB::table('remises')->join('categories','categories.id_cat','=','remises.id_cat')->where('id_remise',$id)->first();
        // dd($sizeM);
        return view('viewFournisseur.remise_edite',compact('remisesM'));
    }

    public function SaveRemise(Request $req)
    {
        $this->validate($req, [
            "remise" => "required",
            "date_debut" => "required",
            "date_fin" => "required",
            "id_cat" => "required",
        ]);

        $id = intval($req->input('id_remise'));

        $RemiseMSave = DB::table('remises')->where('id_remise', $id)->Update(['remise' => $req->input('remise'), 'date_debut' => $req->input('date_debut'), 'date_fin' => $req->input('date_fin'),'id_cat' => $req->input('id_cat')]);
         return redirect()->Route('liste_products',['id' => Session::get('client')->id_user ])->with("errors','Votre modification est enregistrer avec succé");
    }

    public function ModifPhoto($id){
        $hotels = DB::table('hotels')->where('id_user',Session::get('client')->id_user)->first();
        $categories = DB::table('categories')->where('id_hotel',$hotels->id_hotel)->get();
        $photos=DB::table('photos')->join('categories','categories.id_cat','=','photos.id_cat')->where('id_photo',$id)->first();
        // dd($sizeM);
        return view('viewFournisseur.photo_edite',compact('categories','photos'));
    }

    public function SavePhoto(Request $req)
    {
        $this->validate($req, [
            "titre" => "required",
            "description" => "required",
            "id_cat" => "required",
        ]);

        $id = intval($req->input('id_photo'));
        $photo = $req->file('photo');
        $olo_photo = $req->input('old_photo');

        if (!empty($photo)) {
        if ($req->hasFile('photo')) {
            $image = $req->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $photoM = DB::table('photos')->where('id_photo', $id)->Update(['titre' => $req->input('titre'), 'id_cat' => $req->input('id_cat'),'photo' => $imageName,'description' => $req->input('description')]);
            $image->storeAs('img_hotel_cat', $imageName, 'public');
            unlink("storage/img_hotel_cat/".$olo_photo);
            return redirect()->Route('liste_products',['id' => Session::get('client')->id_user ])->with("errors','Votre modification est enregistrer avec succé");
        }else{
            return back()->with('errors', 'Il y a de probléme dans le photo que vous avez inserer!');
        }
        }else{
            $photoM = DB::table('photos')->where('id_photo', $id)->Update(['titre' => $req->input('titre'), 'id_cat' => $req->input('id_cat'),'photo' => $olo_photo,'description' => $req->input('description')]);
            return redirect()->Route('liste_products',['id' => Session::get('client')->id_user ])->with("errors','Votre modification est enregistrer avec succé");
        }

    }

    public function supprPhoto($id){
        $photo = DB::table('photos')->where('id_photo',$id)->first();
        unlink("storage/img_hotel_cat/".$photo->photo);
        $photoSuppre = DB::table('photos')->where('id_photo',$id)->delete();
        return redirect()->Route('liste_products',['id' => Session::get('client')->id_user ])->with("errors','Votre donnée est supprimer avec succé");
    }

    public function ModifCleChambre($id){
        $hotels = DB::table('hotels')->where('id_user',Session::get('client')->id_user)->first();
        $categories = DB::table('categories')->where('id_hotel',$hotels->id_hotel)->get();
        $cleChambreM=DB::table('cle_chambres')->where('id_cle_chambre',$id)->first();
        // dd($sizeM);
        return view('viewFournisseur.cle_chambre_edite',compact('hotels','categories','cleChambreM'));
    }

    public function SaveCleChambre(Request $req)
    {
        $this->validate($req, [
            "id_cat" => "required",
            "numero" => "required",
        ]);

        $id = intval($req->input('id_cle_chambre'));

        $cleChambreMSave = DB::table('cle_chambres')->where('id_cle_chambre', $id)->Update(['id_cat' => $req->input('id_cat'), 'cle_numero' => $req->input('numero')]);
         return redirect()->Route('liste_products',['id' => Session::get('client')->id_user ])->with("errors','Votre modification est enregistrer avec succé");
    }

    public function SaveCleChambreActive($id)
    {
        $cleChambre = DB::table('cle_chambres')->where('id_cle_chambre', $id)->first();
        if ($cleChambre->active === '1') {
           $cleChambreMSave = DB::table('cle_chambres')->where('id_cle_chambre', $id)->Update(['active' => '0']);
           return redirect()->Route('liste_products',['id' => Session::get('client')->id_user ])->with("errors','Votre modification est enregistrer avec succé");

        }else{
            $cleChambreMSave = DB::table('cle_chambres')->where('id_cle_chambre', $id)->Update(['active' => '1']);
        return redirect()->Route('liste_products',['id' => Session::get('client')->id_user ])->with("errors','Votre modification est enregistrer avec succé");
        }
    }
}
