@extends('layoutsFourniseur.master')
@section('titre')
    Ajout Produits
@endsection
@section('contenue')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            @if (Session::has('errors'))
            <p class="bg-info">{{ Session::get('errors') }}</p>
            @endif
            <!-- Main-body start -->
            <div class="main-body">
                <div class="page-wrapper">

                    <!-- Page body start -->
                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- Input Alignment card start -->
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Ajout Information de l'hotel</h5>

                                        <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>
                                    </div>
                                    <div class="card-block">
                                        <form action="{{ Route('ajoutInfoHotel') }}" method="post" enctype="multipart/form-data">
                                          @csrf
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Nom Hotel
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="nom_hotel" class="form-control form-control-capitalize"
                                                        placeholder>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Adresse Hotel
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control form-control-capitalize" name="adresse_hotel"
                                                        placeholder>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Ville
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control form-control-capitalize" name="ville_hotel"
                                                        placeholder>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Nombre de chambre
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control form-control-capitalize" name="nbr_chambre"
                                                        placeholder>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">photo
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="file" class="form-control form-control-capitalize" name="photo"
                                                        placeholder>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Description
                                                </label>
                                                <div class="col-sm-10">
                                                   <textarea class="col-sm-10" name="description" id="" cols="30" rows="10"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">contact
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control form-control-capitalize" name="contact"
                                                        placeholder>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Nombre d'etoile
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control form-control-capitalize" name="nbr_etoil"
                                                        placeholder>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-10">
                                                    <input type="hidden" value="{{ Session::get('client')->id_user }}" class="form-control form-control-capitalize" name="id_user"
                                                        placeholder>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary btn-round" type="submit" >Enregistrer</button>

                                        </form>
                                    </div>
                                </div>
                                <!-- Input Alignment card end -->
                                <!-- Input Alignment card start -->
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Ajout
                                            Categorie</h5>

                                        <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>
                                    </div>
                                    <div class="card-block">
                                        <form action="{{ Route('ajoutCategorie') }}" method="post">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Categorie
                                                </label>
                                                <div class="col-sm-10">
                                                    <select name="categorie" class="form-select">
                                                        @if ($hotels)
                                                        @if (!$categoriesVip)
                                                         <option value="VIP">VIP</option>
                                                        @endif
                                                        @if (!$categoriesSimple)
                                                          <option value="SIMPLE">SIMPLE</option>
                                                        @endif
                                                        @else
                                                        <option value="VIP">VIP</option>
                                                        <option value="SIMPLE">SIMPLE</option>
                                                        @endif
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Nombre
                                                    de
                                                    Clé
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="number"
                                                    @if ($hotels)
                                                    @if ($categoriesVip && $categoriesSimple)
                                                      value=""
                                                       readonly
                                                      @else
                                                        @if ($categoriesVip)
                                                            value="{{ $hotels->nbr_chambre-$categoriesVip->nbr_cle }}"
                                                            @else
                                                            @if ($categoriesSimple)
                                                            value="{{ $hotels->nbr_chambre-$categoriesSimple->nbr_cle }}"
                                                            @else
                                                            value=""

                                                            @endif
                                                        @endif
                                                    @endif
                                                    @else
                                                    value=""
                                                    @endif
                                                     name="nbr_cle"
                                                     class="form-control form-control-capitalize"
                                                        placeholder>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Prix
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="number"  name="prix" class="form-control form-control-capitalize"
                                                        placeholder>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-10">
                                                    <input type="hidden"  name="id_hotel" @if ($hotels) value="{{ $hotels->id_hotel }}"
                                                    @else
                                                    value=""
                                                    @endif  class="form-control form-control-capitalize"
                                                        placeholder>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary btn-round" type="submit" >Enregistrer</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- Input Alignment card end -->
                            </div>
                        </div>
                    </div>
                    <!-- Page body end -->

                    <!-- Page body start -->
                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">

                                <!-- Input Alignment card start -->
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Ajout
                                            Rémise</h5>

                                        <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>
                                    </div>
                                    <div class="card-block">
                                        <form action="{{ Route('ajoutRemise') }}" method="post">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Categorie
                                                </label>
                                                <div class="col-sm-10">
                                                    <select name="id_cat" class="form-select">
                                                        @if ($hotels)
                                                        @foreach ($categories as $categorie)
                                                          <option value="{{ $categorie->id_cat }}">{{ $categorie->categorie  }}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Remise
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="number" name="remise" class="form-control form-control-capitalize"
                                                        placeholder>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Date
                                                    Debut
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="date" name="date_debut" class="form-control form-control-capitalize"
                                                        placeholder>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Date
                                                    Fin
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="date" name="date_fin" class="form-control form-control-capitalize"
                                                        placeholder>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-10">
                                                    <input type="hidden"  name="id_hotel" @if ($hotels)
                                                        value="{{ $hotels->id_hotel }}"
                                                        @else
                                                        value=""
                                                    @endif  class="form-control form-control-capitalize"
                                                        placeholder>
                                                </div>
                                            </div>

                                            <button class="btn btn-primary btn-round" type="submit" >Enregistrer</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- Input Alignment card end -->

                                <!-- Input Alignment card start -->
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Ajout Photo</h5>

                                        <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>
                                    </div>
                                    <div class="card-block">
                                        <form action="{{ Route('ajoutPhoto') }}" method="post" enctype="multipart/form-data">
                                           @csrf
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">photo
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="file" name="photo" class="form-control form-control-capitalize"
                                                        placeholder>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Titre
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="titre" class="form-control form-control-capitalize"
                                                        placeholder>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Déscription
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="description" class="form-control form-control-capitalize"
                                                        placeholder>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Categorie
                                                </label>
                                                <div class="col-sm-10">
                                                    <select name="id_cat" class="form-select">
                                                        @if ($hotels)
                                                        @foreach ($categories as $categorie)
                                                          <option value="{{ $categorie->id_cat }}">{{ $categorie->categorie  }}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>

                                                </div>
                                            </div>
                                            <button class="btn btn-primary btn-round" type="submit" >Enregistrer</button>

                                        </form>
                                    </div>
                                </div>
                                <!-- Input Alignment card end -->

                                <!-- Page body start -->
                                <div class="page-body">
                                    <div class="row">
                                        <div class="col-sm-12">

                                            <!-- Input Alignment card start -->
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5>Ajout
                                                        Clé
                                                        des
                                                        Chambres<h5>

                                                            <div class="card-header-right"><i
                                                                    class="icofont icofont-spinner-alt-5"></i></div>
                                                </div>
                                                <div class="card-block">
                                                    <form action="{{ Route('ajoutCleChambre') }}" method="post">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Categorie
                                                            </label>
                                                            <div class="col-sm-10">
                                                                <select name="id_cat" id="id_catCle" class="form-select">
                                                                    @if ($hotels)
                                                                    @foreach ($categories as $categorie)
                                                                      <option value="{{ $categorie->id_cat }}">{{ $categorie->categorie  }}</option>
                                                                    @endforeach
                                                                    @endif
                                                                </select>

                                                            </div>
                                                        </div>
                                                        @if ($hotels)

                                                        {{-- @foreach ($categories as $categorie)
                                                              <input type="hidden" id="{{ $categorie->id_cat }}" class="inputCat" value="{{ $categorie->nbr_cle }}" >
                                                        @endforeach --}}
                                                        @endif
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Debut
                                                                de
                                                                numero
                                                            </label>
                                                            <div class="col-sm-10">
                                                                <input type="number" name="debut_numero"
                                                                    class="form-control form-control-capitalize"
                                                                    placeholder>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Fin
                                                                de
                                                                Numero
                                                            </label>
                                                            <div class="col-sm-10">
                                                                <input type="number" name="fin_numero" id="fin_numero"

                                                                    class="form-control form-control-capitalize"
                                                                    placeholder>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-primary btn-round" type="submit" >Enregistrer</button>

                                                    </form>
                                                    {{-- <script>
                                                          let id_catCle = document.querySelector('#id_catCle');
                                                          let fin_numero = document.querySelector('#fin_numero');
                                                          let inputCat = document.querySelectorAll('.inputCat');
                                                          function catFonction() {
                                                              console.log(id_catCle.value);

                                                              for (let j = 0; j < inputCat.length; j++) {
                                                                    if (inputCat[j].id === id_catCle.value) {
                                                                        fin_numero.value = inputCat[j].value;
                                                                    }
                                                              }
                                                          }

                                                          setInterval(() => {
                                                            catFonction()
                                                          }, 100);
                                                    </script> --}}
                                                </div>
                                            </div>
                                            <!-- Input Alignment card end -->
                                        </div>
                                    </div>
                                </div>
                                <!-- Page body end -->

                            </div>
                        </div>
                    </div>
                    <!-- Page body end -->
                </div>
            </div>
            <!-- Main-body end -->
            <div id="styleSelector">

            </div>
        </div>
    </div>
@endsection
