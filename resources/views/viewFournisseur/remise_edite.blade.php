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
                                        <h5>Ajout
                                            Rémise</h5>

                                        <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>
                                    </div>
                                    <div class="card-block">
                                        <form action="{{ Route('SaveRemise') }}" method="post">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Categorie
                                                </label>
                                                <div class="col-sm-10">
                                                    <select name="id_cat" class="form-select">

                                                          <option value="{{ $remisesM->id_cat }}">{{ $remisesM->categorie }}</option>

                                                    </select>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Remise
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="number" value="{{ $remisesM->remise }}" name="remise" class="form-control form-control-capitalize"
                                                        placeholder>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Date
                                                    Debut
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="date" value="{{ $remisesM->date_debut }}"  name="date_debut" class="form-control form-control-capitalize"
                                                        placeholder>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Date
                                                    Fin
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="date"  value="{{ $remisesM->date_fin }}"  name="date_fin" class="form-control form-control-capitalize"
                                                        placeholder>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-10">
                                                    <input type="hidden"  name="id_remise" value="{{ $remisesM->id_remise }}" class="form-control form-control-capitalize"
                                                        placeholder>
                                                </div>
                                            </div>

                                            <button class="btn btn-primary btn-round" type="submit" >Modifier</button>
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
