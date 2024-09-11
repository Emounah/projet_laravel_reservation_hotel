<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{getClient,getFournisseur,getAdmin,postFournisseur,postConnexion,getDeconnexion,postClient};
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
//Route Pour interface Client
Route::get("/",[getClient::class,"indixClient"])->name("indixClient");
Route::get("aboutClient/{id}",[getClient::class,"aboutClient"])->name("aboutClient");
// Route::middleware(['auth'])->group(function(){
//     Route::get('aboutClient/{id}', function(){
//        return view('aboutClient');
//     });
// });
Route::get("/connexion",[getClient::class,"connexion"])->name("connexion");
Route::any("detail_hotel/{id}",[getClient::class,"detail_hotel"])->name("detail_hotel");
Route::get("/inscription",[getClient::class,"inscription"])->name("inscription");
Route::get("/inscriptionFournisseur",[getClient::class,"inscriptionFournisseur"])->name("inscriptionFournisseur");
Route::get("/paymentClient",[getClient::class,"paymentClient"])->name("paymentClient");
Route::get("/paymentFournisseur",[getClient::class,"paymentFournisseur"])->name("paymentFournisseur");
Route::post("/ajoutClient",[postClient::class,"ajoutClient"])->name("ajoutClient");
//SaveInformation
Route::any("/SaveInformation",[postClient::class,"SaveInformation"])->name("SaveInformation");
//SavePasswordClient
Route::any("/SavePasswordClient",[postClient::class,"SavePasswordClient"])->name("SavePasswordClient");
//ajoutCommande
Route::any('ajoutCommande',[postClient::class,'ajoutCommande'])->name('ajoutCommande');

Route::any('ajoutResevationClientPayer',[postClient::class,'ajoutResevationClientPayer'])->name('ajoutResevationClientPayer');

//Route pour interface fournisseur
Route::get("/fournisseur_index",[getFournisseur::class,"fournisseur_index"])->name("fournisseur_index");
Route::get("/ajout_cle_payment",[getFournisseur::class,"ajout_cle_payment"])->name("ajout_cle_payment");
Route::get("/ajout_employe",[getFournisseur::class,"ajout_employe"])->name("ajout_employe");
Route::get("/ajout_fonction",[getFournisseur::class,"ajout_fonction"])->name("ajout_fonction");
Route::get("/ajout_payment",[getFournisseur::class,"ajout_payment"])->name("ajout_payment");
Route::get("ajout_products/{id}",[getFournisseur::class,"ajout_products"])->name("ajout_products");
Route::get("/liste_cle_payment",[getFournisseur::class,"liste_cle_payment"])->name("liste_cle_payment");
Route::get("/liste_employe",[getFournisseur::class,"liste_employe"])->name("liste_employe");
Route::get("/liste_fonction",[getFournisseur::class,"liste_fonction"])->name("liste_fonction");
Route::get("liste_payment/{id}",[getFournisseur::class,"liste_payment"])->name("liste_payment");
Route::get("liste_products/{id}",[getFournisseur::class,"liste_products"])->name("liste_products");
Route::get("panier/{id}",[getFournisseur::class,"panier"])->name("panier");
Route::get("/reservation",[getFournisseur::class,"reservation"])->name("reservation");
//Modication Profile FOurnisseur
Route::get("/edite_profile",[getFournisseur::class,"edite_profile"])->name("edite_profile");
//Post Fournisseur
Route::any("/SaveProfile",[postFournisseur::class,"SaveProfile"])->name("SaveProfile");
//SavePassword
Route::any("/SavePassword",[postFournisseur::class,"SavePassword"])->name("SavePassword");
//ajoutInfoHotel
Route::post("/ajoutInfoHotel",[postFournisseur::class,"ajoutInfoHotel"])->name("ajoutInfoHotel");
//ajoutCategorie
Route::post("/ajoutCategorie",[postFournisseur::class,"ajoutCategorie"])->name("ajoutCategorie");
//ajoutRemise
Route::post("/ajoutRemise",[postFournisseur::class,"ajoutRemise"])->name("ajoutRemise");
//ajoutPhoto
Route::post("/ajoutPhoto",[postFournisseur::class,"ajoutPhoto"])->name("ajoutPhoto");
//ajoutCleChambre
Route::post("/ajoutCleChambre",[postFournisseur::class,"ajoutCleChambre"])->name("ajoutCleChambre");
//Modification Hotel
Route::get("hotel_edite/{id}",[getFournisseur::class,"hotel_edite"]);
//SaveHotel
Route::any("/SaveHotel",[postFournisseur::class,"SaveHotel"])->name("SaveHotel");
//supprCategory
Route::any("supprCategory/{id}",[postFournisseur::class,"supprCategory"])->name("supprCategory");
//ModifCategorie
Route::get("ModifCategorie/{id}",[postFournisseur::class,"ModifCategorie"])->name("ModifCategorie");
//SaveCategorie
Route::any("/SaveCategorie",[postFournisseur::class,"SaveCategorie"])->name("SaveCategorie");
//supprRemise
Route::any("supprRemise/{id}",[postFournisseur::class,"supprRemise"])->name("supprRemise");
//ModifRemise
Route::get("ModifRemise/{id}",[postFournisseur::class,"ModifRemise"])->name("ModifRemise");
//SaveRemise
Route::any("/SaveRemise",[postFournisseur::class,"SaveRemise"])->name("SaveRemise");
//ModifPhoto
Route::get("ModifPhoto/{id}",[postFournisseur::class,"ModifPhoto"])->name("ModifPhoto");
//SavePhoto
Route::any("/SavePhoto",[postFournisseur::class,"SavePhoto"])->name("SavePhoto");
//supprPhoto
Route::any("supprPhoto/{id}",[postFournisseur::class,"supprPhoto"])->name("supprPhoto");
//ModifCleChambre
Route::get("ModifCleChambre/{id}",[postFournisseur::class,"ModifCleChambre"])->name("ModifCleChambre");
//SaveCleChambre
Route::any("/SaveCleChambre",[postFournisseur::class,"SaveCleChambre"])->name("SaveCleChambre");
//SaveCleChambreActive
Route::any("SaveCleChambreActive/{id}",[postFournisseur::class,"SaveCleChambreActive"])->name("SaveCleChambreActive");


//Route Pour Admin
Route::get("/admin_index",[getAdmin::class,"admin_index"])->name("admin_index");
Route::get("/products_admin",[getAdmin::class,"products_admin"])->name("products_admin");
Route::get("/prix",[getAdmin::class,"prix"])->name("prix");


//Post Fournisseur
Route::any('ajoutFournisseur',[postFournisseur::class,'ajoutFournisseur'])->name('ajoutFournisseur');

//Payment Fournisseur
Route::any('ajoutFournisseurPayer',[postFournisseur::class,'ajoutFournisseurPayer'])->name('ajoutFournisseurPayer');


// Se conecter;
Route::post('conecter',[postConnexion::class,'conecter'])->name('conecter');
//deconnexion
Route::get('deconnexion',[getDeconnexion::class,'deconnexion'])->name('deconnexion');
