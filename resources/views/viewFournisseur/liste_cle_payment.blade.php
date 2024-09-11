@extends('layoutsFourniseur.master')
@section('titre')
Liste Clé Payment
@endsection
@section('contenue')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">

                  <!-- Page-body start -->
                  <div class="page-body">
                    <!-- Inverse table card start -->
                    <div class="card">
                        <div class="card-header">
                            <h5>Listes Fonctions</h5>
                            <div
                                class="card-header-right">
                                <ul
                                    class="list-unstyled card-option">
                                    <li><i
                                            class="icofont icofont-simple-left "></i></li>
                                    <li><i
                                            class="icofont icofont-maximize full-card"></i></li>
                                    <li><i
                                            class="icofont icofont-minus minimize-card"></i></li>
                                    <li><i
                                            class="icofont icofont-refresh reload-card"></i></li>
                                    <li><i
                                            class="icofont icofont-error close-card"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div
                            class="card-block table-border-style">
                            <div
                                class="table-responsive">
                                <table
                                    class="table table-inverse">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Clé public</th>
                                            <th>Clé privé</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th
                                                scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Mark</td>
                                            <td>
                                                <button
                                                    class="btn btn-primary btn-icon"><i
                                                        class="ti-pencil"></i></button>
                                                <button
                                                    class="btn btn-danger btn-icon"><i
                                                        class="ti-trash"></i></button>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Inverse table card end -->

                </div>
                <!-- Page-body end -->


            </div>
        </div>
        <!-- Main-body end -->

        <div id="styleSelector">

        </div>
    </div>
</div>
@endsection
