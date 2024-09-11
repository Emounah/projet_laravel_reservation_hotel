@php
    $connexion =true;
@endphp
@extends('layoutsClient.master')
@section('titre')
Page de connexion
@endsection
@section('contenue')
<section class="section_container">
    <div class="containere">
        <form action="{{ Route('conecter') }}" method="post">
            @csrf
            <div class="form">
                <h2>Connexion</h2>
                @if (Session::has('errors'))
                <p class="" style="color: red;">{{ Session::get('errors') }}</p>
                @endif
                <div class="form_block">
                    <div class="inputBox">
                        <input type="email" name="email" required="required">
                        <i class="far fa-envelope"></i>
                        <span>Adresse Email</span>
                    </div>
                    <div class="inputBox">
                        <input type="password" name="password" required="required">
                        <i class="fas fa-lock"></i>
                        <span>Mot De Passe</span>
                    </div>
                </div>
                <div class="inputBox inputBoxSubmit">
                    <input type="submit" value="Connecter">
                </div>
                <p>Vous n'avez pas encore un compt? <i class="fas fa-arrow-right"></i> <a href="{{ Route('inscription') }}" class="login">S'inscrire</a></p>
            </div>
        </form>

    </div>
</section>
@endsection
