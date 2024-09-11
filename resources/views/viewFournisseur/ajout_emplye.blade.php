@extends('layoutsFourniseur.master')
@section('titre')
    Ajout Employé
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

                                <!-- Input Alignment card start -->
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Ajout Employé</h5>

                                        <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>
                                    </div>
                                    <div class="card-block">
                                        <form>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Fonction
                                                </label>
                                                <div class="col-sm-10">
                                                    <select class="form-select">
                                                        <option>Accueil</option>
                                                        <option>Directeur</option>
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Nom
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control form-control-capitalize"
                                                        placeholder>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Prénom
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control form-control-capitalize"
                                                        placeholder>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Date de naissance
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="date" class="form-control form-control-capitalize"
                                                        placeholder>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Adresse
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control form-control-capitalize"
                                                        placeholder>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Situation Matrimonial
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control form-control-capitalize"
                                                        placeholder>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Contact
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control form-control-capitalize"
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
                                                    class="form-control form-control-capitalize"
                                                    placeholder>
                                            </div>
                                        </div>
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
