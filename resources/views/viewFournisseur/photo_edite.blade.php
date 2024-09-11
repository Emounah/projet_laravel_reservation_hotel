@extends('layoutsFourniseur.master')
@section('titre')
    Modifier Photo
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
                                        <h5>Modification Photo</h5>

                                        <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>
                                    </div>
                                    <div class="card-block">
                                        <form action="{{ Route('SavePhoto') }}" method="post" enctype="multipart/form-data">
                                           @csrf
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">photo
                                                </label>
                                                <img src="{{ asset('storage/img_hotel_cat/'.$photos->photo) }}" alt="">
                                                <div class="col-sm-10">
                                                    <input type="hidden" value="{{ $photos->photo }}" name="old_photo">
                                                    <input type="file" name="photo" class="form-control form-control-capitalize"
                                                        placeholder>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Titre
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="hidden" value="{{ $photos->id_photo }}" name="id_photo" class="form-control form-control-capitalize"
                                                        placeholder>
                                                    <input type="text" value="{{ $photos->titre }}" name="titre" class="form-control form-control-capitalize"
                                                        placeholder>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Déscription
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="text" value="{{ $photos->description }}" name="description" class="form-control form-control-capitalize"
                                                        placeholder>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Categorie
                                                </label>
                                                <div class="col-sm-10">
                                                    <select name="id_cat" class="form-select">
                                                        @foreach ($categories as $categorie)
                                                          <option value="{{ $categorie->id_cat }}" @if ($photos->id_cat===$categorie->id_cat)
                                                              {{ 'selected' }}
                                                          @endif>{{ $categorie->categorie  }}</option>
                                                        @endforeach
                                                    </select>

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
