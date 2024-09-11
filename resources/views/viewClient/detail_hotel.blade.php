@extends('layoutsClient.master')
@section('titre')
    page detail Hotel
@endsection
@section('contenue')
    <header class="section_container header_container">
        <div class="header_image_container"
            style="background: linear-gradient(to right, purple, rgba(100, 125, 187, 0.1)), url({{ asset('storage/img_hotel/' . $userHotels->photo) }}); background-position: center center; background-size: cover; background-repeat: no-repeat; object-fit: cover;">
            <div class="header_content">
                <h1>{{ $userHotels->nom_hotel }}</h1>
                <p>{{ $userHotels->description }}</p>
            </div>

            <div class="contact_hotel">
                <div class="contact_hotel_content">
                    <i class="fas fa-phone"></i>
                    <h4>{{ $userHotels->contact }}</h4>
                </div>
                <div class="contact_hotel_content">
                    <i class="fas fa-city"></i>
                    <h4>Madagascar, {{ $userHotels->ville }}</h4>
                </div>
                <div class="contact_hotel_content">
                    <i class="fas fa-at"></i>
                    <h4>{{ $userHotels->adresse_hotel }}</h4>
                </div>

                @foreach ($reservations as $reservation)
                @if ($reservation->id_hotel === $userHotels->id_hotel)
                 <input type="date" class="dateDebutReserver" value="{{ $reservation->date_debut }}">
                 <input type="date" class="dateFinReserver" value="{{ $reservation->date_fin }}">
                @endif
                @endforeach
                <div class="contact_hotel_content">
                    <i class="far fa-envelope"></i>
                    <a href="mailto:solofosoncecilienbotralahy@gmail.com">{{ $userHotels->email }}</a>
                </div>
            </div>
        </div>
    </header>
    @foreach ($categorie as $categories)
        @if ($categories->categorie === 'SIMPLE')
            <section class="section_container popular_container">
                <h2 class="section_header">{{ $categories->categorie }}(prix:

                    @php
                        $remiseint = count($remises);
                    @endphp
                    @if ($remiseint === 0)
                        {{ $categories->prix }}
                        <input type="hidden" value="{{ $categories->prix }}" class="inputPrix">
                    @else
                        @foreach ($remises as $remise)
                            @if ($remise->id_cat === $categories->id_cat)
                                {{ ($categories->prix * $remise->remise) / 100 }}
                                <input type="hidden" value="{{ ($categories->prix * $remise->remise) / 100 }}"
                                    class="inputPrix">
                            @else
                                <input type="hidden" value="{{ $categories->prix }}" class="inputPrix">
                                {{ $categories->prix }}
                            @endif
                        @endforeach
                    @endif
                    ) Ar
                </h2>
                <form action="{{ Route('ajoutCommande') }}" method="post">
                    @if ($errors)
                    <p class="sms" style="color:red;">
                        @foreach ($errors->all() as $item)
                                {{ $item }}
                        @endforeach
                    </p>
                    @endif
                    @csrf
                    <div class="header_image_container"
                        style="background: linear-gradient(to right, purple, rgba(100, 125, 187, 0.1)), url({{ asset('storage/img_hotel/' . $userHotels->photo) }}); background-position: center center; background-size: cover; background-repeat: no-repeat; object-fit: cover;">
                        <div id="calculator">
                            <div class="dateReser">
                                <div class="datedebut">
                                    <label for="">Date de debut :</label>
                                    <input id="dateDebut" name="date_debut" type="date" required>
                                    <input id="id_cle_chambre" name="id_cle_chambre" type="hidden">

                                    <input value="{{ $categories->id_hotel }}" name="id_hotel" type="hidden" required>
                                </div>
                                <div class="datedebut datefin">
                                    <label for="">Date Fin :</label>
                                    <input id="dateFin" name="date_fin" type="date" required>
                                </div>
                                <div class="datedebut heure">
                                    <label for="">Heure :</label>
                                    <input type="time" name="heureSimple" id="heureSimple" required>
                                </div>
                            </div>
                            <!-- <input type="date" name="" id=""> -->
                            <h1>CLE N°</h1>
                            <input id="display" class="display1" name="numeroCle" readonly>
                            <h1>SOMME TOTAL</h1>
                            <input id="totalPrix" class="totalPrixSimple" name="prixTotalSimple" readonly>
                            <div class="keys keys1" id="keys">
                                @foreach ($cleChambre as $cleChambres)
                                    @if ($cleChambres->id_cat === $categories->id_cat)
                                        <button id="{{ $cleChambres->id_cle_chambre }}" class="btnNumero"
                                            @foreach ($cle_chambresTous as $cle_chambresTou)
                    @if ($cle_chambresTou->id_cle_chambre === $cleChambres->id_cle_chambre)

                    @if ($cle_chambresTou->active === '0')
                    style="color:hsl(0, 0%, 40%);pointer-events:none;cursor:not-allowed;"
                         {{ 'disabled' }}
                    @endif
                    @endif @endforeach
                                            onclick="appendToDisplay('{{ $cleChambres->cle_numero }}','{{ $cleChambres->id_cle_chambre }}')">{{ $cleChambres->cle_numero }}</button>
                                    @endif
                                @endforeach
                                <div class="btn-valide btn_valide1">
                                    <a href="{{ url('detail_hotel/' . $categories->id_hotel) }}"
                                        style="text-decoration: none;color:white;">Annuler</a>
                                    <button type="submit" >Enregistrer</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="popular_grid owl-carousel">
                    @foreach ($photos as $photo)
                        @if ($photo->id_cat === $categories->id_cat)
                            <div class="popular_card">
                                <img src="{{ Asset('storage/img_hotel_cat/' . $photo->photo) }}" alt="hotel">
                                <div class="popular_content">
                                    <div class="popular_card_header">
                                        <p>{{ $photo->titre }}</p>
                                        <!-- <h4>Remise:-50%</h4> -->
                                    </div>
                                    <div class="popular_card_header">
                                        <h4>{{ $photo->description }}</h4>
                                        <!-- <h4>Remise:-50%</h4> -->
                                    </div>

                                </div>
                                <div class="popular_card_header_star">
                                    @for ($star = 0; $star < (int) $categories->nbr_etoil; $star++)
                                        <i class="fas fa-star"></i>
                                    @endfor
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </section>
            <script src="{{ asset('js/detail_hotel.js') }}"></script>
        @endif
    @endforeach


    @foreach ($categorie as $categories)
        @if ($categories->categorie === 'VIP')
            <section class="section_container container_vip">
                <h2 class="section_header">{{ $categories->categorie }}(prix:

                    @php
                        $remiseint = count($remises);
                    @endphp
                    @if ($remiseint === 0)
                        {{ $categories->prix }}
                        <input type="hidden" value="{{ $categories->prix }}" class="inputPrixVip">
                    @else
                        @foreach ($remises as $remise)
                            @if ($remise->id_cat === $categories->id_cat)
                                {{ ($categories->prix * $remise->remise) / 100 }}
                                <input type="hidden" value="{{ ($categories->prix * $remise->remise) / 100 }}"
                                    class="inputPrixVip">
                            @else
                                {{ $categories->prix }}
                                <input type="hidden" value="{{ $categories->prix }}" class="inputPrixVip">
                            @endif
                        @endforeach
                    @endif
                    ) Ar
                </h2>
                <form action="{{ Route('ajoutCommande') }}" method="post">
                    @csrf
                    <div class="header_image_container">
                        <div id="calculator">
                            <div class="dateReser">
                                <div class="datedebut">
                                    <label for="">Date de debut :</label>
                                    <input id="dateDebutVip" name="date_debut" type="date" required>
                                    <input id="id_cle_chambre2" name="id_cle_chambre" type="hidden">
                                    <input value="{{ $categories->id_hotel }}" name="id_hotel" type="hidden" required>
                                </div>
                                <div class="datedebut datefin">
                                    <label for="">Date Fin :</label>
                                    <input id="dateFinVip" name="date_fin" type="date" required>
                                </div>
                                <div class="datedebut heure">
                                    <label for="">Heure :</label>
                                    <input id="heureVip" name="heureSimple" type="time" required>
                                </div>
                            </div>
                            <!-- <input type="date" name="" id=""> -->
                            <h1>CLE N°</h1>
                            <input id="display" name="numeroCle" class="display2" readonly>
                            <h1>SOMME TOTAL</h1>
                            <input id="totalPrix" name="prixTotalSimple" class="totalPrixVip" readonly>
                            <div class="keys keys2" id="keys">
                                @foreach ($cleChambre as $cleChambres)
                                    @if ($cleChambres->id_cat === $categories->id_cat)
                                        <button id="{{ $cleChambres->id_cle_chambre }}" class="btnNumero2"
                                            @foreach ($cle_chambresTous as $cle_chambresTou)
                    @if ($cle_chambresTou->id_cle_chambre === $cleChambres->id_cle_chambre)

                    @if ($cle_chambresTou->active === '0')
                    style="color:hsl(0, 0%, 40%);pointer-events:none;cursor:not-allowed;"
                         {{ 'disabled' }}
                    @endif
                    @endif @endforeach
                                            onclick="appendToDisplayVip('{{ $cleChambres->cle_numero }}','{{ $cleChambres->id_cle_chambre }}')">{{ $cleChambres->cle_numero }}</button>
                                    @endif
                                @endforeach
                                <div class="btn-valide btn_valide2">
                                    <a href="{{ url('detail_hotel/' . $categories->id_hotel) }}"
                                        style="text-decoration: none;color:white;">Annuler</a>
                                    <button type="submit">Enregistrer</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="container_vip_card owl-carousel">
                    @foreach ($photos as $photo)
                        @if ($photo->id_cat === $categories->id_cat)
                            <div class="container_card">
                                <div class="icon">
                                    <!-- <a href="" class="iconKey"><i class="fas fa-key"></i></a> -->
                                </div>
                                <div class="container_vip_content">
                                    <div class="popular_card_header">
                                        <p>{{ $photo->titre }}</p>
                                        <!-- <h4>Remise:-50%</h4> -->
                                    </div>
                                    <div class="popular_card_header">
                                        <h4>{{ $photo->description }}</h4>
                                        <!-- <h4>Remise:-50%</h4> -->
                                    </div>

                                </div>
                                <img src="{{ Asset('storage/img_hotel_cat/' . $photo->photo) }}" alt="">
                                <div class="popular_card_header_star_vip">
                                    @for ($star = 0; $star < (int) $categories->nbr_etoil; $star++)
                                        <i class="fas fa-star"></i>
                                    @endfor
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </section>
            <script src="{{ asset('js/detail_hotel_vip.js') }}"></script>
        @endif
    @endforeach

    @if ($remiseint != 0)
        <section class="section_container section_container_remise">
            <h2 class="section_header">{{ $userHotels->nom_hotel }}</h2>
            <div class="section_remise ">
                <img src="{{ Asset('storage/img_hotel/' . $userHotels->photo) }}" alt="">
                <div class="section_remise_content">
                    @foreach ($remises as $remise)
                        @if ($remise->categorie === 'SIMPLE')
                            <h1>{{ $remise->remise }}% Simple</h1>
                        @endif
                        @if ($remise->categorie === 'VIP')
                            <h1>{{ $remise->remise }}% de Remise</h1>
                        @endif
                    @endforeach
                    <h3>{{ $userHotels->nom_hotel }}</h3>
                    @foreach ($remises as $remise)
                        @if ($remise->categorie === 'SIMPLE')
                            <h4 class="tsipika">{{ $remise->prix }} Ar</h4>
                            <h4>Simple: {{ ($remise->prix * $remise->remise) / 100 }}</h4>
                        @endif

                        @if ($remise->categorie === 'VIP')
                            <h4 class="tsipika">{{ $remise->prix }}</h4>
                            <h4>VIP: {{ ($remise->prix * $remise->remise) / 100 }}</h4>
                        @endif
                    @endforeach

                    <p>{{ $userHotels->ville }}, Madagascar</p>
                </div>
            </div>
        </section>
    @endif
@endsection
