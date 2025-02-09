@extends('layoutsAdmin.master')
@section('titre')
Tableau de Bord
@endsection
@section('contenue')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="icofont icofont-pie-chart bg-c-blue card1-icon"></i>
                                    <span class="text-c-blue f-w-600"> Nombre <br> d'hotel</span>
                                    <h4>49</h4>
                                    <div>
                                        <!-- <span class="f-left m-t-10 text-muted">
                                            <i
                                                class="text-c-blue f-16 icofont icofont-warning m-r-10"></i>

                                        </span> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card1 end -->
                        <!-- card1 start -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="icofont icofont-ui-home bg-c-pink card1-icon"></i>
                                    <span class="text-c-pink f-w-600">Nombre <br>de client </span>
                                    <h4>$23,589</h4>
                                    <div>
                                        <!-- <span class="f-left m-t-10 text-muted">
                                            <i
                                                class="text-c-pink f-16 icofont icofont-calendar m-r-10"></i>Last
                                            24 hours
                                        </span> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card1 end -->
                        <!-- card1 start -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i
                                        class="icofont icofont-warning-alt bg-c-green card1-icon"></i>
                                    <span class="text-c-green f-w-600">Nombre de <br>client actif</span>
                                    <h4>45</h4>
                                    <div>
                                        <!-- <span class="f-left m-t-10 text-muted">
                                            <i
                                                class="text-c-green f-16 icofont icofont-tag m-r-10"></i>Tracked
                                            via microsoft
                                        </span> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card1 end -->
                        <!-- card1 start -->
                        {{-- <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i
                                        class="icofont icofont-social-twitter bg-c-yellow card1-icon"></i>
                                    <span class="text-c-yellow f-w-600">T <br> Employeur</span>
                                    <h4>+562</h4>
                                    <div>

                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <!-- card1 end -->
                        <!-- Statestics Start -->
                        <div class="col-md-12 col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Statestics</h5>
                                    <div class="card-header-left ">
                                    </div>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li><i class="icofont icofont-simple-left "></i></li>
                                            <li><i class="icofont icofont-maximize full-card"></i>
                                            </li>
                                            <li><i class="icofont icofont-minus minimize-card"></i>
                                            </li>
                                            <li><i class="icofont icofont-refresh reload-card"></i>
                                            </li>
                                            <li><i class="icofont icofont-error close-card"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div id="statestics-chart" style="height:517px;"></div>
                                </div>
                            </div>
                        </div>




                        <!-- Email Sent End -->

                    </div>
                </div>

                <div id="styleSelector">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
