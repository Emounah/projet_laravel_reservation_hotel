@extends('layoutsFourniseur.master')
@section('titre')
Listes Réservation
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
                            <h5>Information Hotel</h5>
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
                                            <th>Nom Client</th>
                                            <th>Nombre de chambre</th>
                                            <th>Prix</th>
                                            <th>Date du debut</th>
                                            <th>Date du Fin</th>
                                            <th>Heure</th>
                                            <th>Active</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($hotels)
                                        @foreach ($reservations as $reservation)

                                        <tr>
                                            <th
                                                scope="row">{{ $reservation->id_reservation }}</th>
                                            <td>{{ $reservation->nom }} {{ $reservation->prenom }}</td>
                                            <td>
                                                @foreach ($reservationsTous as $reservationsTou)
                                                @if ($reservationsTou->id_reservation === $reservation->id_reservation)
                                                {{ $reservationsTou->nbr_chambre }}
                                                @endif
                                                @endforeach
                                            </td>
                                            <td>{{ $reservation->prix }}</td>
                                            <td>{{ $reservation->date_debut }}</td>
                                            <td>{{ $reservation->date_fin }}</td>
                                            <td>{{ $reservation->heure }}</td>
                                            <td>
                                                @foreach ($reservationsTous as $reservationsTou)
                                                @if ($reservationsTou->id_reservation === $reservation->id_reservation)
                                                {{ $reservationsTou->active }}
                                                @endif
                                                @endforeach
                                            </td>
                                            <td><button
                                                    class="btn btn-primary btn-icon"><i
                                                        class="ti-pencil"></i></button></td>
                                            <!-- <td><button class="btn btn-danger btn-icon"><i class="ti-trash"></i></button></td> -->
                                        </tr>
                                        @endforeach

                                        @endif
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
