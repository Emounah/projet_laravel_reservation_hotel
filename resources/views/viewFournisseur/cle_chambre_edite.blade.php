@extends('layoutsFourniseur.master')
@section('titre')
    Modification numero de la clé
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

                                <!-- Page body start -->
                                <div class="page-body">
                                    <div class="row">
                                        <div class="col-sm-12">

                                            <!-- Input Alignment card start -->
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5>Modification du Clé<h5>

                                                            <div class="card-header-right"><i
                                                                    class="icofont icofont-spinner-alt-5"></i></div>
                                                </div>
                                                <div class="card-block">
                                                    <form action="{{ Route('SaveCleChambre') }}" method="post">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Categorie
                                                            </label>
                                                            <div class="col-sm-10">
                                                                <select name="id_cat" id="id_catCle" class="form-select">
                                                                    @if ($hotels)
                                                                    @foreach ($categories as $categorie)
                                                                      <option value="{{ $categorie->id_cat }}" @if ($cleChambreM->id_cat===$categorie->id_cat)
                                                                          {{ 'selected' }}
                                                                      @endif>{{ $categorie->categorie  }}</option>
                                                                    @endforeach
                                                                    @endif
                                                                </select>

                                                            </div>
                                                        </div>
                                                        {{-- @if ($hotels)

                                                        @foreach ($categories as $categorie)
                                                              <input type="hidden" id="{{ $categorie->id_cat }}" class="inputCat" value="{{ $categorie->nbr_cle }}" >
                                                        @endforeach
                                                        @endif --}}
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">
                                                                numero
                                                            </label>
                                                            <div class="col-sm-10">
                                                                <input type="number" value="{{ $cleChambreM->cle_numero }}" name="numero"
                                                                    class="form-control form-control-capitalize"
                                                                    placeholder>
                                                                    <input type="hidden" value="{{ $cleChambreM->id_cle_chambre }}" name="id_cle_chambre"
                                                                    class="form-control form-control-capitalize"
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
