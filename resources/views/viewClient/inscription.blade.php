@php
    $inscription=true;
    $inscriClient =true;
@endphp
@extends('layoutsClient.master')
@section('titre')
Page d'inscription Client
@endsection
@section('contenue')
<section class="section_container">
    <div class="containere">
        <form action="{{ Route('ajoutClient') }}" method="post">
            @csrf
            <div class="form">
                <h2>Inscription Client</h2>
                @if (Session::has('errors'))
                <p style="color:red;">{{ Session::get('errors') }}</p>
                @endif
                <div class="form_block">
                    <div class="inputBox">
                        <input type="text" name="nomC" required="required">
                        <i class="fas fa-user"></i>
                        <span>Nom</span>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="prenomC" required="required">
                        <i class="far fa-user"></i>
                        <span>Prénom</span>
                    </div>
                </div>
                <div class="form_block">
                    <div class="inputBox">
                        <input type="email" name="emailC" required="required">
                        <i class="far fa-envelope"></i>
                        <span>Adresse Email</span>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="contactC" required="required">
                        <i class="fas fa-lock"></i>
                        <span>Numero Mobile</span>
                    </div>
                </div>
                <div class="form_block">
                    <div class="inputBox">
                        <input type="password" name="mdpC" required="required">
                        <i class="fas fa-lock"></i>
                        <span>Mot De Passe</span>
                    </div>
                    <div class="inputBox">
                        <input type="password" name="ConfigMdpC" required="required">
                        <i class="fas fa-lock"></i>
                        <span>Confirmation Mot De Passe</span>
                    </div>
                </div>
                <div class="inputBox inputBoxSubmit">
                    <input type="submit" value="Enregistrer">
                </div>
                <p>Avez vous deja un compte? <i class="fas fa-arrow-right"></i> <a href="connexion.html" class="login">Connexion</a></p>
            </div>
        </form>

    </div>
</section>
@endsection
