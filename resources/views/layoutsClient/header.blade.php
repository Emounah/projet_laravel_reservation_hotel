<nav>
    <div class="nav_logo">
        <div class="face face1"><span>RINDRINA EFATRA</span></div>
        <div class="face face2"><span>RINDRINA EFATRA</span></div>
    </div>
    <ul class="nav_links">
        @if (Session::has('client'))
        <li class="link"><a href="{{ url('/') }}" class="custom-btn btn-5 @if (isset($index))
            {{ "active" }}
        @endif ">Accueil</a></li>
        <li class="link"><a href="{{ url('aboutClient/'.Session::get('client')->id_user) }}" class="custom-btn btn-5 @if (isset($aboutClient))
            {{ "active" }}
        @endif">A propos</a></li>
        <li class="link"><a href="{{ Route('deconnexion') }}" class="custom-btn btn-5">Deconnexion</a></li>
        @else
        <li class="link"><a href="{{ url('/') }}" class="custom-btn btn-5 @if (isset($index))
            {{ "active" }}
        @endif ">Accueil</a></li>
        <li class="link"><button href class="ulFCBtn custom-btn btn-5 @if (isset($inscription))
            {{ "active" }}
        @endif">Inscription</button>
            <ul class="ulFC">
                <li><a href="{{ Route('inscription') }}" class="@if (isset($inscriClient))
                    {{ "activeClientFournisseur" }}
                @endif">Client</a></li>
                <li><a href="{{ Route('inscriptionFournisseur') }}" class="@if (isset($inscriFourni))
                     {{ "activeClientFournisseur" }}
                @endif" >Fournisseur</a></li>
            </ul>
        </li>
        <li class="link"><a href="{{ Route('connexion') }}" class="custom-btn btn-5 @if (isset($connexion))
               {{ "active" }}
        @endif">Connexion</a></li>
        @endif
    </ul>

    <div class="bars">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
  </div>
</nav>
