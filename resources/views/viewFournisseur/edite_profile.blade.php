@extends('layoutsFourniseur.master')
@section('titre')
Modification Profile
@endsection
@section('contenue')
<div class="pcoded-content">
    <div class="pcoded-inner-content">

        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">



                <!-- Page body start -->
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            @if (Session::has('errors'))
                            <p class="bg-info">{{ Session::get('errors') }}</p>
                            @endif
                            <!-- Input Alignment card start -->
                            <div class="card">
                                <div
                                    class="card-header">
                                    <h5>Modification Information</h5>

                                    <div
                                        class="card-header-right"><i
                                            class="icofont icofont-spinner-alt-5"></i></div>
                                </div>
                                <div class="card-block">
                                    <form action="{{ Route('SaveProfile') }}" method="post">
                                       @csrf


                                        <div
                                            class="form-group row">
                                            <label
                                                class="col-sm-2 col-form-label">Nom
                                            </label>
                                            <div
                                                class="col-sm-10">
                                                <input
                                                    type="hidden"
                                                    class="form-control form-control-capitalize"
                                                    name="id_user"
                                                    value="{{ Session::get('client')->id_user; }}"
                                                    placeholder>
                                                <input
                                                    type="text"
                                                    class="form-control form-control-capitalize"
                                                    name="nom"
                                                    value="{{ Session::get('client')->nom; }}"
                                                    placeholder>
                                            </div>
                                        </div>
                                        <div
                                            class="form-group row">
                                            <label
                                                class="col-sm-2 col-form-label">Prénom
                                            </label>
                                            <div
                                                class="col-sm-10">
                                                <input
                                                    type="text"
                                                    name="prenom"
                                                    value="{{ Session::get('client')->prenom; }}"
                                                    class="form-control form-control-capitalize"
                                                    placeholder>
                                            </div>
                                        </div>
                                        <div
                                            class="form-group row">
                                            <label
                                                class="col-sm-2 col-form-label">Email
                                            </label>
                                            <div
                                                class="col-sm-10">
                                                <input
                                                    type="text"
                                                    name="email"
                                                    value="{{ Session::get('client')->email; }}"
                                                    class="form-control form-control-capitalize"
                                                    placeholder>
                                            </div>
                                        </div>
                                        <div
                                            class="form-group row">
                                            <label
                                                class="col-sm-2 col-form-label">Contact
                                            </label>
                                            <div
                                                class="col-sm-10">
                                                <input
                                                    type="text"
                                                    name="contact"
                                                    value="{{ Session::get('client')->contact; }}"
                                                    class="form-control form-control-capitalize"
                                                    placeholder>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-round" type="submit" >Modifier</button>
                                    </form>
                                </div>
                            </div>
                            <!-- Input Alignment card end -->


                              <!-- Input Alignment card start -->
                              <div class="card">
                                <div
                                    class="card-header">
                                    <h5>Modification Mot de passe</h5>

                                    <div
                                        class="card-header-right"><i
                                            class="icofont icofont-spinner-alt-5"></i></div>
                                </div>
                                <div class="card-block">
                                    <form  action="{{ Route('SavePassword') }}" method="post">
                                        @csrf


                                        <div
                                            class="form-group row">
                                            <label
                                                class="col-sm-2 col-form-label">Mot de Passe Actuel
                                            </label>
                                            <div
                                                class="col-sm-10">
                                                <input
                                                    type="hidden"
                                                    class="form-control form-control-capitalize"
                                                    name="id_user"
                                                    value="{{ Session::get('client')->id_user; }}"
                                                    placeholder>
                                                <input
                                                    type="password"
                                                    class="form-control form-control-capitalize"
                                                    name="password"
                                                    placeholder="Entrer votre mot de passe actuel">
                                            </div>
                                        </div>
                                        <div
                                            class="form-group row">
                                            <label
                                                class="col-sm-2 col-form-label">Nouveau mot de passe
                                            </label>
                                            <div
                                                class="col-sm-10">
                                                <input
                                                    type="password"
                                                    name="new_password"
                                                    class="form-control form-control-capitalize"
                                                    placeholder="Entrer votre nouveau mot de passe">
                                            </div>
                                        </div>
                                        <div
                                            class="form-group row">
                                            <label
                                                class="col-sm-2 col-form-label">Confirmation mot de passe
                                            </label>
                                            <div
                                                class="col-sm-10">
                                                <input
                                                    type="password"
                                                    name="new_config_password"
                                                    class="form-control form-control-capitalize"
                                                    placeholder>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-round" type="submit" >Modifier</button>
                                    </form>
                                </div>
                            </div>
                            <!-- Input Alignment card end -->

                            <!-- Page body start -->

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
