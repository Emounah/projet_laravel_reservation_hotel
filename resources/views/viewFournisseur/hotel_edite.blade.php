@extends('layoutsFourniseur.master')
@section('titre')
    Modification Hotel
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
                                        <h5>Modification Information de l'hotel</h5>

                                        <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>
                                    </div>
                                    <div class="card-block">
                                        <form action="{{ Route('SaveHotel') }}" method="post" enctype="multipart/form-data">
                                          @csrf
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Nom Hotel
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="hidden" value="{{ $hotels->id_hotel }}" name="id_hotel" class="form-control form-control-capitalize" placeholder>

                                                    <input type="text" value="{{ $hotels->nom_hotel }}" name="nom_hotel" class="form-control form-control-capitalize"
                                                        placeholder>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Adresse Hotel
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="text" value="{{ $hotels->adresse_hotel }}" class="form-control form-control-capitalize" name="adresse_hotel"
                                                        placeholder>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Ville
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="text" value="{{ $hotels->ville }}" class="form-control form-control-capitalize" name="ville_hotel"
                                                        placeholder>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Nombre de chambre
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="number" value="{{ $hotels->nbr_chambre }}" class="form-control form-control-capitalize" name="nbr_chambre"
                                                        placeholder>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">photo
                                                </label>
                                                <img src="{{ asset('storage/img_hotel/'.$hotels->photo) }}" alt="">
                                                <div class="col-sm-10">
                                                    <input type="hidden" value="{{ $hotels->photo }}" class="form-control form-control-capitalize" name="old_photo" placeholder>

                                                    <input type="file" class="form-control form-control-capitalize" name="photo"
                                                        placeholder>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Description
                                                </label>
                                                <div class="col-sm-10">
                                                   <textarea class="col-sm-10" name="description" id="" cols="30" rows="10">{{ $hotels->description }}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">contact
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="number" value="{{ $hotels->contact }}" class="form-control form-control-capitalize" name="contact"
                                                        placeholder>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Nombre d'etoile
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="number" value="{{ $hotels->nbr_etoil }}" class="form-control form-control-capitalize" name="nbr_etoil"
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

                </div>
            </div>
            <!-- Main-body end -->
            <div id="styleSelector">

            </div>
        </div>
    </div>
@endsection
