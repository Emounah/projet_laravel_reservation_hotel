@php
    $inscription=true;
    $inscriFourni=true;
@endphp
@extends('layoutsClient.master')
@section('titre')
Page d'inscription fournisseur
@endsection
@section('contenue')
<section class="section_container">
    <div class="containere">
        <form action="{{ Route('ajoutFournisseur') }}" method="post">
            @csrf
            <div class="form">
                <h2>Inscription Fournisseur</h2>
                @if ($errors)

                <p style='color:red;'>

                    @foreach ($errors->all() as $item)
                            {{ $item }}
                    @endforeach

                </p>
                @endif
                @if (Session::has('error'))

                <p style='color:red;'>

                    {{ Session::get('error') }}

               </p>
                @endif
                <div class="form_block">
                    <div class="inputBox">
                        <input type="text" class="nomF" name="nomF" required="required">
                        <i class="fas fa-user"></i>
                        <span>Nom</span>
                    </div>
                    <div class="inputBox">
                        <input type="text"  class="prenomF" name="prenomF" required="required">
                        <i class="far fa-user"></i>
                        <span>Prénom</span>
                    </div>
                </div>
                <div class="form_block">
                    <div class="inputBox">
                        <input type="email" class="emailF" name="emailF" required="required">
                        <i class="far fa-envelope"></i>
                        <span>Adresse Email</span>
                    </div>
                    <div class="inputBox">
                        <input type="text" class="contactF" name="contactF" required="required">
                        <i class="fas fa-lock"></i>
                        <span>Numero Mobile</span>
                    </div>
                </div>
                <div class="form_block">
                    <div class="inputBox">
                        <input type="password" class="mdpF" name="mdpF" required="required">
                        <i class="fas fa-lock"></i>
                        <span>Mot De Passe</span>
                    </div>
                    <div class="inputBox">
                        <input type="password" class="ConfigMdpF" name="ConfigMdpF" required="required">
                        <i class="fas fa-lock"></i>
                        <span>Confirmation Mot De Passe</span>
                    </div>
                    <input type="hidden" class="status" value="" name="status" required="required">
                    <input type="hidden" class="" value="" name="active" required="required">


                </div>
                <div class="inputBox inputBoxSubmit">
                   <input type="submit" class="EngF" value="Enregistrer">
                </div>
                <p>Avez vous deja un compte? <i class="fas fa-arrow-right"></i> <a href="connexion.html" class="login">Connexion</a></p>
            </div>
        </form>

    </div>
</section>

@endsection

