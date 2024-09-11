@php
    $index=true;
@endphp
@extends('layoutsClient.master')
@section('titre')
Page D'accueil
@endsection
@section('contenue')
<header class="section_container header_container">
    <div class="header_image_container">
        <div class="header_content">
            <h1>RESERVATION CHAMBRE D'HOTEL</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Recusandae vitae voluptatum facere beatae quo illo harum
                officia illum perferendis, repudiandae at aliquid, nam
                non fuga a qui totam mollitia voluptates? Lorem ipsum
                dolor sit amet consectetur adipisicing elit. Quos maxime
                doloremque ratione magnam placeat quaerat ipsa, suscipit
                sed, dicta unde sunt itaque explicabo! Pariatur odit
                quas fugiat nihil maxime soluta? Lorem ipsum dolor sit
                amet consectetur adipisicing elit. Placeat in fugiat
                necessitatibus dignissimos porro veniam, esse maxime
                nostrum ut aliquam quo vel, quasi ducimus assumenda
                dolorem veritatis earum debitis harum? Lorem ipsum dolor
                sit amet consectetur, adipisicing elit.</p>
            <form action="" class="booking_container" method="get">
                <div action class="form_group">
                    <div class="select-box1">
                        <label for>Choisir le ville <i class="fas fa-arrow-turn-down"></i></label>
                        <div class="select-option1">
                            <input type="text" name="keyword" placeholder="Recherche Ville" id="soValue1" readonly>
                        </div>
                        <div class="content1">
                            <div class="search1">
                                <input type="search" name id="optionSearch1" placeholder="Search">
                            </div>
                            <ul class="options1">
                                @foreach ($userHotels as  $userHotel)
                                <li class="listeVille">{{ $userHotel->ville }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <script>
                    let listeVille = document.querySelectorAll(".listeVille");
                    for (let i = 0; i < listeVille.length; i++) {
                        for (let j = 0; j < listeVille.length; j++) {
                            if (i == j) {} else {
                                if (listeVille[i].textContent == listeVille[j].textContent) {
                                    listeVille[j].textContent = "";
                                }
                            }
                        }
                    }
                    for (let ii = 0; ii < listeVille.length; ii++) {
                        if (listeVille[ii].textContent == "") {
                            listeVille[ii].style = `display:none;`
                        }
                    }
                    </script>
                <div action class="form_group">
                    <div class="select-box2">
                        <label for>Choisir l'hotel <i class="fas fa-arrow-turn-down"></i></label>
                        <div class="select-option2">
                            <input type="text" name="keyword2" placeholder="Recherche l'hotel" id="soValue2" readonly>
                        </div>
                        <div class="content2">
                            <div class="search2">
                                <input type="search" name id="optionSearch2" placeholder="Search">
                            </div>
                            <ul class="options2">
                                @foreach ($userHotels as $userHotel)
                                <li class="nomHotelle">{{ $userHotel->nom_hotel }}</li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
                <script>
                    let nomHotelle = document.querySelectorAll(".nomHotelle");
                    for (let i = 0; i < nomHotelle.length; i++) {
                        for (let j = 0; j < nomHotelle.length; j++) {
                            if (i == j) {} else {
                                if (nomHotelle[i].textContent == nomHotelle[j].textContent) {
                                    nomHotelle[j].textContent = "";
                                }
                            }
                        }
                    }
                    for (let ii = 0; ii < nomHotelle.length; ii++) {
                        if (nomHotelle[ii].textContent == "") {
                            nomHotelle[ii].style = `display:none;`
                        }
                    }
                    </script>
                <!-- <form action="" class="form_group">
                    <div class="input_group">
                       <input type="text" name="" id="">
                       <label for="">Nom hotel</label>
                    </div>
                    <p>Quel hotel que vous voulez reserver?</p>
               </form> -->
                <button class="btn"><i class="fab fa-sistrix"></i></button>
            </form>
        </div>
    </div>
</header>

<section class="section_container popular_container">
    <h2 class="section_header">HOTELS MOINS DE CENT MILLE ARIARY</h2>
    <div class="popular_grid owl-carousel">
        @foreach ( $userHotels as $userHotel )
        @if ($userHotel->prix < 100000 && $userHotel->categorie === 'SIMPLE')
        <div class="searchrap">
        <div class="popular_card id{{ $userHotel->id_hotel }}">
            @foreach ($Hotels as $Hotel)
            @if ($Hotel->id_hotel === $userHotel->id_hotel)
             <img src="{{ Asset('storage/img_hotel/'.$Hotel->photo) }}" alt="hotel">
            @endif
            @endforeach
            <div class="popular_content">
                <div class="popular_card_header">
                    <h4>{{ $userHotel->nom_hotel }}</h4>
                    <h4>{{ $userHotel->prix }} Ar</h4>
                    <!-- <h4>Remise:-50%</h4> -->
                </div>
                <div class="popular_card_header">
                    <p>{{ $userHotel->ville }}, Madagascar</p>
                    {{-- @foreach ($remises as $remise)
                    @if ($userHotel->id_cat === $remise->id_cat)
                    <h4>{{ $remise->remise }}</h4>
                    @endif
                    @endforeach --}}
                </div>
                <div class="popular_card_header">
                    <a href="{{ url('detail_hotel/'.$userHotel->id_hotel) }}" class="custom-btn btn-12"><span>Click!</span><span><i
                                class="fas fa-info"></i></span></a>
                    <a
                    @if (Session::has('client'))
                    href="{{ url('detail_hotel/'.$userHotel->id_hotel) }}"
                    @else
                      href="{{ Route('inscription') }}"
                    @endif
                    class="custom-btn btn-12"><span>Click!</span><span><i class="fas fa-key"></i></span></a>
                </div>
            </div>
            <div class="popular_card_header_star">
                {{-- <input class="inputEtoil" type="text" value="{{ $userHotel->nbr_etoil }}"> --}}
                {{-- @foreach ($userHotel->nbr_etoil as $userEtoil) --}}
                @for ($star = 0; $star < (int)$userHotel->nbr_etoil; $star++)
                   <i class="fas fa-star starEtoil"></i>
                @endfor

            </div>
        </div>
        </div>
        @endif
        @endforeach
    </div>

</section>

<section class="section_container simple_container_plus_cher">
    <h2 class="section_header">HOTELS PLUS DE CENT MILLE ARIARY</h2>
    <div class="simple_cont owl-carousel">
        @foreach ( $userHotels as $userHotel )
        @if ($userHotel->prix >= 100000 && $userHotel->categorie === 'SIMPLE')
        <div class="simple_container_plus_cher_card id{{ $userHotel->id_hotel }}">
            @foreach ($Hotels as $Hotel)
            @if ($Hotel->id_hotel === $userHotel->id_hotel)
             <div class="imgBox">
                <img src="{{ Asset('storage/img_hotel/'.$Hotel->photo) }}" alt="hotel">
             </div>
            @endif

            @endforeach
            <div class="simple_container_plus_cher_content">
                <div class="popular_card_header">
                    <h3>{{ $userHotel->nom_hotel }}</h3>
                    <h4>{{ $userHotel->prix }} Ar</h4>

                </div>
                <div class="popular_card_header">
                    <p>{{ $userHotel->ville }} , Madagascar</p>
                    {{-- @foreach ($remises as $remise)
                    @if ($userHotel->id_cat === $remise->id_cat)
                    <h4>{{ $remise->remise }}</h4>
                    @endif
                    @endforeach --}}
                    <!-- <h4>Remise:-50%</h4> -->
                </div>
                <div class="popular_card_header">
                    <a href="{{ url('detail_hotel/'.$userHotel->id_hotel) }}" class="custom-btn btn-12"><span>Click!</span><span><i
                                class="fas fa-info"></i></span></a>
                    <a
                    @if (Session::has('client'))
                    href="{{ url('detail_hotel/'.$userHotel->id_hotel) }}"
                    @else
                      href="{{ Route('inscription') }}"
                    @endif
                    class="custom-btn btn-12"><span>Click!</span><span><i class="fas fa-key"></i></span></a>
                </div>
            </div>
            <div class="popular_card_header_star">
                @for ($star = 0; $star < (int)$userHotel->nbr_etoil; $star++)
                   <i class="fas fa-star starEtoil"></i>
                @endfor
            </div>
        </div>
        @endif
        @endforeach

    </div>
    <script>
        let simple_container_plus_cher_card = document.querySelectorAll(".simple_container_plus_cher_card");
        for (let i = 0; i < simple_container_plus_cher_card.length; i++) {
            for (let j = 0; j < simple_container_plus_cher_card.length; j++) {
                if (i == j) {} else {
                    if (simple_container_plus_cher_card[i].classList[1] == simple_container_plus_cher_card[j].classList[1]) {
                        simple_container_plus_cher_card[j].classList.remove(simple_container_plus_cher_card[j].classList[1]);
                    }
                }
            }
        }
        for (let ii = 0; ii < simple_container_plus_cher_card.length; ii++) {
            if (simple_container_plus_cher_card[ii].classList[1]== "") {
                simple_container_plus_cher_card[ii].style = `display:none;`
            }
        }
        </script>
</section>

<section class="section_container container_vip">
    <h2 class="section_header">HOTELS VIP</h2>
    <div class="container_vip_card owl-carousel">
        @foreach ( $userHotels as $userHotel )
        @if ($userHotel->categorie === 'VIP')
        <div class="container_card id{{ $userHotel->id_hotel }}">
            <div class="icon">
                <a
                @if (Session::has('client'))
                href="{{ url('detail_hotel/'.$userHotel->id_hotel) }}"
                @else
                  href="{{ Route('inscription') }}"
                @endif
                 class="iconKey"><i class="fas fa-key"></i></a>
            </div>
            <div class="container_vip_content">
                <div class="popular_card_header">
                    <h3>{{ $userHotel->nom_hotel }}</h3>
                    <h4>{{ $userHotel->prix }}</h4>
                    <!-- <h4>Remise:-50%</h4> -->
                </div>
                <div class="popular_card_header">
                    <p>{{ $userHotel->ville }}, Madagascar</p>
                    @foreach ($remises as $remise)
                    @if ($userHotel->id_cat === $remise->id_cat)
                    <h4>{{ $remise->remise }}</h4>
                    @endif
                    @endforeach
                    <!-- <h4>Remise:-50%</h4> -->
                </div>
                <div class="popular_card_header vip_icon_info">
                    <a href="{{ url('detail_hotel/'.$userHotel->id_hotel) }}" class="custom-btn btn-12"><span>Click!</span><span><i
                                class="fas fa-info"></i></span></a>
                </div>
            </div>
            @foreach ($Hotels as $Hotel)
            @if ($Hotel->id_hotel === $userHotel->id_hotel)
             <img src="{{ Asset('storage/img_hotel/'.$Hotel->photo) }}" alt="hotel">
            @endif
            @endforeach
            <div class="popular_card_header_star_vip">
                @for ($star = 0; $star < (int)$userHotel->nbr_etoil; $star++)
                   <i class="fas fa-star starEtoil"></i>
                @endfor
            </div>
        </div>
        @endif
        @endforeach

    </div>
<script>
    let container_card = document.querySelectorAll(".container_card");
        for (let i = 0; i < container_card.length; i++) {
            for (let j = 0; j < container_card.length; j++) {
                if (i == j) {} else {
                    if (container_card[i].classList[1] == container_card[j].classList[1]) {
                        container_card[j].classList.remove(container_card[j].classList[1]);
                    }
                }
            }
        }
        for (let ii = 0; ii < container_card.length; ii++) {
            if (container_card[ii].classList[1]== "") {
                container_card[ii].style = `display:none;`
            }
        }
</script>
</section>

<section class="section_container section_container_remise">
    <h2 class="section_header">HOTELS FAIT LE REMISE</h2>
    <div class="diapo">
        <div class="section_card_remise">
            @foreach ( $userHotels as $userHotel )
            @foreach ($remises as $remise)
            @if ($userHotel->id_cat === $remise->id_cat)
            <div class="section_remise id{{ $userHotel->id_hotel }}">
                @foreach ($Hotels as $Hotel)
                @if ($Hotel->id_hotel === $userHotel->id_hotel)
                  <img src="{{ Asset('storage/img_hotel/'.$Hotel->photo) }}" alt="hotel">
                @endif
                @endforeach
                {{-- <img src="images/image5.jpeg" alt> --}}
                <div class="section_remise_content">
                    @foreach ($userRemise as $userRemises)
                        @if ($userRemises->id_hotel ===  $userHotel->id_hotel)
                        @if ($userRemises->categorie==='SIMPLE')
                         <h1>{{ $userRemises->remise }}% SIMPLE</h1>
                        @endif
                        @if ($userRemises->categorie==='VIP')
                        <h1>{{ $userRemises->remise }}% VIP</h1>
                        @endif
                        @endif
                    @endforeach
                    <h3>{{ $userHotel->nom_hotel }}</h3>
                    @foreach ($userRemise as $userRemises)
                    @if ($userRemises->id_hotel ===  $userHotel->id_hotel)
                    @if ($userRemises->categorie==='SIMPLE')
                    <h4 class="tsipika">{{ $userRemises->prix }}</h4>
                    <h4>Simple: {{ ((($userRemises->prix)*$userRemises->remise)/100) }} Ar</h4>
                    @endif
                    @if ($userRemises->categorie==='VIP')
                    <h4 class="tsipika">{{ $userRemises->prix }}</h4>
                    <h4>Vip: {{ ((($userRemises->prix)*$userRemises->remise)/100) }} Ar</h4>
                    @endif
                    @endif
                    @endforeach
                    <p>Antananarivo, Madagascar</p>
                    <div class="popular_card_header">
                        <a href="{{ url('detail_hotel/'.$userHotel->id_hotel) }}" class="custom-btn btn-12"><span>Click!</span><span><i class="fas fa-info"></i></span></a>
                        <a
                        @if (Session::has('client'))
                        href="{{ url('detail_hotel/'.$userHotel->id_hotel) }}"
                        @else
                          href="{{ Route('inscription') }}"
                        @endif
                         class="custom-btn btn-12"><span>Click!</span><span><i class="fas fa-key"></i></span></a>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            @endforeach
        </div>
        <i id="nav-gauche" class="fas fa-chevron-left"></i>
        <i id="nav-droite" class="fas fa-chevron-right"></i>
    </div>
    <script>
    let section_remise = document.querySelectorAll(".section_remise");
        for (let i = 0; i < section_remise.length; i++) {
            for (let j = 0; j < section_remise.length; j++) {
                if (i == j) {} else {
                    if (section_remise[i].classList[1] == section_remise[j].classList[1]) {
                        section_remise[j].classList.remove(section_remise[j].classList[1]);
                    }
                }
            }
        }
        for (let ii = 0; ii < section_remise.length; ii++) {
            if (section_remise[ii].classList[1]== "") {
                section_remise[ii].style = `display:none;`
            }
        }
    </script>
</section>
@endsection

