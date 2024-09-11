@extends('layoutsFourniseur.master')
@section('titre')
Ajout Clé de payment
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
                                <div
                                    class="card-header">
                                    <h5>Ajout Clé de payment</h5>

                                    <div
                                        class="card-header-right"><i
                                            class="icofont icofont-spinner-alt-5"></i></div>
                                </div>
                                <div class="card-block">
                                    <form>

                                        <div
                                            class="form-group row">
                                            <label
                                                class="col-sm-2 col-form-label">Clé public
                                            </label>
                                            <div
                                                class="col-sm-10">
                                                <input
                                                    type="text"
                                                    class="form-control form-control-capitalize"
                                                    placeholder>
                                            </div>
                                        </div>

                                        <div
                                        class="form-group row">
                                        <label
                                            class="col-sm-2 col-form-label">Clé privé
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
