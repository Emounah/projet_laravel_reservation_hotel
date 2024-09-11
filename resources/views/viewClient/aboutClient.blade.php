@php
    $aboutClient = true;
@endphp
@extends('layoutsClient.master')
@section('titre')
Page à propos Client
@endsection
@section('contenue')
<section class="section_container">
    <div class="containere">
        <form action="{{ Route('SaveInformation') }}" method="post" class="formInfo">
            @csrf
            <div class="form">
                <h2>Modification Information</h2>
                @if (Session::has('errors'))
                <p class="" style="color: red;">{{ Session::get('errors') }}</p>
                @endif
                <div class="btnPlus">
                    <div class="btnPlusFont"><i class="fas fa-plus-circle"></i></div>
                    <div class="contonair_hotel">
                        <table>
                            <thead>
                                <tr>
                                    <th>Hotel</th>
                                    <th>Date Debut</th>
                                    <th>Date Fin</th>
                                    <th>Nombre de chambre</th>
                                    <th>Prix</th>
                                    <th>Heure</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($userReservers as $userReserver)
                                <tr>
                                    <td>{{ $userReserver->nom_hotel }}</td>
                                    <td>{{ $userReserver->date_debut }}</td>
                                    <td>{{ $userReserver->date_fin }}</td>
                                    <td>
                                        @foreach ($reservations as $reservation)
                                             @if ($userReserver->id_reservation === $reservation->id_reservation)
                                               {{ $reservation->nbr_chambre }}
                                             @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $userReserver->prix }}</td>
                                    <td>{{ $userReserver->heure }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="form_block">
                    <div class="inputBox">
                        <input type="hidden" value="{{ Session::get('client')->id_user }}" name="id_user" required="required">
                        <input type="text" value="{{ Session::get('client')->nom }}" name="nom" required="required">
                        <i class="fas fa-user"></i>
                        <span>Nom</span>
                    </div>
                    <div class="inputBox">
                        <input type="text" value="{{ Session::get('client')->prenom }}" name="prenom" required="required">
                        <i class="far fa-user"></i>
                        <span>Prénom</span>
                    </div>
                </div>
                <div class="form_block">
                    <div class="inputBox">
                        <input type="email" value="{{ Session::get('client')->email }}" name="email" required="required">
                        <i class="far fa-envelope"></i>
                        <span>Adresse Email</span>
                    </div>
                    <div class="inputBox">
                        <input type="text" value="{{ Session::get('client')->contact }}" name="contact" required="required">
                        <i class="fas fa-lock"></i>
                        <span>Numero Mobile</span>
                    </div>
                </div>

                <div class="inputBox inputBoxSubmit">
                    <input type="submit" value="Modifier">
                </div>
                <p>Changer Mon Mot De Passe<i class="fas fa-arrow-right"></i> <a class="btnInfo">Changer</a></p>
            </div>
        </form>

        <form action="{{ Route('SavePasswordClient') }}" method="post" class="formMdp">
            @csrf
            <div class="form">
                <h2>Modification Mot De Passe</h2>
                <div class="form_block">
                    <div class="inputBox">
                        <input type="hidden" value="{{ Session::get('client')->id_user }}" name="id_user" required="required">
                        <input type="password" name="password" required="required">
                        <i class="fas fa-user"></i>
                        <span>Mot de passe actuelle</span>
                    </div>
                    <div class="inputBox">
                        <input type="password" name="new_password" required="required">
                        <i class="far fa-user"></i>
                        <span>Nouveau Mot De Passe</span>
                    </div>
                </div>
                <div class="form_block">
                    <div class="inputBox">
                        <input type="password" name="new_config_password" required="required">
                        <i class="far fa-envelope"></i>
                        <span>Confirmation mot de passe</span>
                    </div>
                </div>

                <div class="inputBox inputBoxSubmit">
                    <input type="submit" value="Modifier">
                </div>
                <p><i class="fas fa-arrow-right"></i> <a class="btnMdp">Retour</a></p>
            </div>
        </form>

    </div>
    <script src="{{ asset('js/about.js') }}"></script>
</section>
@endsection
