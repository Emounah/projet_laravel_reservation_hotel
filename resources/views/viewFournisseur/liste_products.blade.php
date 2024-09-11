@extends('layoutsFourniseur.master')
@section('titre')
    Listes Produits
@endsection
@section('contenue')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            @if (Session::has('errors'))
                <p class="bg-info">{{ Session::get('errors') }}</p>
            @endif
            <!-- Main-body start -->
            <div class="main-body">
                <div class="page-wrapper">

                    <!-- Page-body start -->
                    <div class="page-body">
                        <!-- Inverse table card start -->
                        <div class="card">
                            <div class="card-header">
                                <h5>Information Hotel</h5>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="icofont icofont-simple-left "></i></li>
                                        <li><i class="icofont icofont-maximize full-card"></i></li>
                                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                                        <li><i class="icofont icofont-error close-card"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-block table-border-style">
                                <div class="table-responsive">
                                    <table class="table table-inverse">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nom
                                                    hotel</th>
                                                <th>Adresse</th>
                                                <th>ville</th>
                                                <th>nbr
                                                    chambre</th>
                                                <th>photo</th>
                                                <th>Description</th>
                                                <th>contact</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @if ($hotels)
                                                    <th scope="row">{{ $hotels->id_hotel }}</th>
                                                    <td>{{ $hotels->nom_hotel }}</td>
                                                    <td>{{ $hotels->adresse_hotel }}</td>
                                                    <td>{{ $hotels->ville }}</td>
                                                    <td>{{ $hotels->nbr_chambre }}</td>
                                                    <td>
                                                        <img src="{{ asset('storage/img_hotel/' . $hotels->photo) }}"
                                                            style="width:40px;height:40px;" alt="">
                                                    </td>
                                                    <td>{{ $hotels->description }}</td>
                                                    <td>{{ $hotels->contact }}</td>
                                                    <td><a href="{{ url('hotel_edite/' . $hotels->id_hotel) }}"><button
                                                                class="btn btn-primary btn-icon"><i
                                                                    class="ti-pencil"></i></button></a></td>
                                                    <!-- <td><button class="btn btn-danger btn-icon"><i class="ti-trash"></i></button></td> -->
                                                @endif
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Inverse table card end -->

                    </div>
                    <!-- Page-body end -->

                    <!-- Page-body start -->
                    <div class="page-body">
                        <!-- Inverse table card start -->
                        <div class="card">
                            <div class="card-header">
                                <h5>Listes Catégories</h5>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="icofont icofont-simple-left "></i></li>
                                        <li><i class="icofont icofont-maximize full-card"></i></li>
                                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                                        <li><i class="icofont icofont-error close-card"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-block table-border-style">
                                <div class="table-responsive">
                                    <table class="table table-inverse">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nombre de Clé</th>
                                                <th>prix</th>
                                                <th>categorie</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($hotels)
                                                @foreach ($categories as $categorie)
                                                    <tr>
                                                        <th scope="row">{{ $categorie->id_cat }}</th>
                                                        <td>{{ $categorie->nbr_cle }}</td>
                                                        <td>{{ $categorie->prix }}</td>
                                                        <td>{{ $categorie->categorie }}</td>
                                                        <td>
                                                            <a href="{{ url('ModifCategorie/' . $categorie->id_cat) }}"><button
                                                                    class="btn btn-primary btn-icon"><i
                                                                        class="ti-pencil"></i></button></a>

                                                            <button type="button" class="btn btn-danger btn-icon"
                                                                data-toggle="modal"
                                                                data-target="#myModal{{ $categorie->id_cat }}"><i
                                                                    class="ti-trash"></i></button>
                                                        </td>

                                                    </tr>
                                                    <!-- Modal -->
                                                    <div id="myModal{{ $categorie->id_cat }}" class="modal fade"
                                                        role="dialog">
                                                        <div class="modal-dialog">

                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">Suppression</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Voulez-vous vraiment supprimer ce donner?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default"
                                                                        data-dismiss="modal">Non</button>
                                                                    <a
                                                                        href="{{ url('supprCategory/' . $categorie->id_cat) }}"><button
                                                                            type="button"
                                                                            class="btn btn-primary">Oui</button></a>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!-- Modal end -->
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

                    <!-- Page-body start -->
                    <div class="page-body">
                        <!-- Inverse table card start -->
                        <div class="card">
                            <div class="card-header">
                                <h5>Rémise</h5>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="icofont icofont-simple-left "></i></li>
                                        <li><i class="icofont icofont-maximize full-card"></i></li>
                                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                                        <li><i class="icofont icofont-error close-card"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-block table-border-style">
                                <div class="table-responsive">
                                    <table class="table table-inverse">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Categories</th>
                                                <th>Rémise</th>
                                                <th>debut</th>
                                                <th>Fin</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($hotels)
                                                @foreach ($remises as $remise)
                                                    <tr>
                                                        <th scope="row">{{ $remise->id_remise }}</th>
                                                        <td>{{ $remise->categorie }}</td>
                                                        <td>{{ $remise->remise }}%</td>
                                                        <td>{{ $remise->date_debut }}</td>
                                                        <td>{{ $remise->date_fin }}</td>
                                                        <td>
                                                            <a href="{{ url('ModifRemise/' . $remise->id_remise) }}"><button
                                                                    class="btn btn-primary btn-icon"><i
                                                                        class="ti-pencil"></i></button></a>

                                                            <button type="button" class="btn btn-danger btn-icon"
                                                                data-toggle="modal"
                                                                data-target="#myModalremise{{ $remise->id_remise }}"><i
                                                                    class="ti-trash"></i></button>
                                                        </td>

                                                    </tr>

                                                    <!-- Modal -->
                                                    <div id="myModalremise{{ $remise->id_remise }}" class="modal fade"
                                                        role="dialog">
                                                        <div class="modal-dialog">

                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">Suppression</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Voulez-vous vraiment supprimer ce donner?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default"
                                                                        data-dismiss="modal">Non</button>
                                                                    <a
                                                                        href="{{ url('supprRemise/' . $remise->id_remise) }}"><button
                                                                            type="button"
                                                                            class="btn btn-primary">Oui</button></a>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!-- Modal end -->
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

                    <!-- Page-body start -->
                    <div class="page-body">
                        <!-- Inverse table card start -->
                        <div class="card">
                            <div class="card-header">
                                <h5>Photo Chambre
                                    Simple</h5>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="icofont icofont-simple-left "></i></li>
                                        <li><i class="icofont icofont-maximize full-card"></i></li>
                                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                                        <li><i class="icofont icofont-error close-card"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-block table-border-style">
                                <div class="table-responsive">
                                    <table class="table table-inverse">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Photo</th>
                                                <th>Titre</th>
                                                <th>Description</th>
                                                <th>Categories</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($hotels)
                                                @foreach ($photoSimples as $photoSimple)
                                                    @if ($photoSimple->categorie === 'SIMPLE')
                                                        <tr>
                                                            <th scope="row">{{ $photoSimple->id_photo }}</th>
                                                            <td>
                                                                @foreach ($photos as $photo)
                                                                    @if ($photo->id_photo === $photoSimple->id_photo)
                                                                        <img src="{{ asset('storage/img_hotel_cat/' . $photo->photo) }}"
                                                                            style="width:80px;height:80px;"
                                                                            alt="">
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                            <td>{{ $photoSimple->titre }}</td>
                                                            <td>
                                                                @foreach ($photos as $photo)
                                                                    @if ($photo->id_photo === $photoSimple->id_photo)
                                                                        {{ $photo->description }}
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                            <td>{{ $photoSimple->categorie }}</td>

                                                            <td>
                                                                <a href="{{ url('ModifPhoto/' . $photoSimple->id_photo) }}"><button
                                                                        class="btn btn-primary btn-icon"><i
                                                                            class="ti-pencil"></i></button></a>

                                                                <button type="button" class="btn btn-danger btn-icon"
                                                                    data-toggle="modal"
                                                                    data-target="#myModalphoto{{ $photoSimple->id_photo }}"><i
                                                                        class="ti-trash"></i></button>
                                                            </td>

                                                        </tr>
                                                    @endif
                                                    <!-- Modal -->
                                                    <div id="myModalphoto{{ $photoSimple->id_photo }}" class="modal fade"
                                                        role="dialog">
                                                        <div class="modal-dialog">

                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">Suppression</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Voulez-vous vraiment supprimer ce donner?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default"
                                                                        data-dismiss="modal">Non</button>
                                                                    <a
                                                                        href="{{ url('supprPhoto/' . $photoSimple->id_photo) }}"><button
                                                                            type="button"
                                                                            class="btn btn-primary">Oui</button></a>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!-- Modal end -->
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

                    <!-- Page-body start -->
                    <div class="page-body">
                        <!-- Inverse table card start -->
                        <div class="card">
                            <div class="card-header">
                                <h5>Photo Chambre Vip</h5>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="icofont icofont-simple-left "></i></li>
                                        <li><i class="icofont icofont-maximize full-card"></i></li>
                                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                                        <li><i class="icofont icofont-error close-card"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-block table-border-style">
                                <div class="table-responsive">
                                    <table class="table table-inverse">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Photo</th>
                                                <th>Titre</th>
                                                <th>Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($hotels)
                                                @foreach ($photoSimples as $photoSimple)
                                                    @if ($photoSimple->categorie === 'VIP')
                                                        <tr>
                                                            <th scope="row">{{ $photoSimple->id_photo }}</th>
                                                            <td>
                                                                @foreach ($photos as $photo)
                                                                    @if ($photo->id_photo === $photoSimple->id_photo)
                                                                        <img src="{{ asset('storage/img_hotel_cat/' . $photo->photo) }}"
                                                                            style="width:80px;height:80px;"
                                                                            alt="">
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                            <td>{{ $photoSimple->titre }}</td>
                                                            <td>
                                                                @foreach ($photos as $photo)
                                                                    @if ($photo->id_photo === $photoSimple->id_photo)
                                                                        {{ $photo->description }}
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                            <td>{{ $photoSimple->categorie }}</td>

                                                            <td>
                                                                <a href="{{ url('ModifPhoto/' . $photoSimple->id_photo) }}"><button
                                                                        class="btn btn-primary btn-icon"><i
                                                                            class="ti-pencil"></i></button></a>

                                                                <button type="button" class="btn btn-danger btn-icon"
                                                                    data-toggle="modal"
                                                                    data-target="#myModalphoto{{ $photoSimple->id_photo }}"><i
                                                                        class="ti-trash"></i></button>
                                                            </td>

                                                        </tr>
                                                    @endif
                                                    <!-- Modal -->
                                                    <div id="myModalphoto{{ $photoSimple->id_photo }}" class="modal fade"
                                                        role="dialog">
                                                        <div class="modal-dialog">

                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">Suppression</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Voulez-vous vraiment supprimer ce donner?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default"
                                                                        data-dismiss="modal">Non</button>
                                                                    <a
                                                                        href="{{ url('supprPhoto/' . $photoSimple->id_photo) }}"><button
                                                                            type="button"
                                                                            class="btn btn-primary">Oui</button></a>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!-- Modal end -->
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

                    <!-- Page-body start -->
                    <div class="page-body">
                        <!-- Inverse table card start -->
                        <div class="card">
                            <div class="card-header">
                                <h5>Listes les clés des Chambres</h5>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="icofont icofont-simple-left "></i></li>
                                        <li><i class="icofont icofont-maximize full-card"></i></li>
                                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                                        <li><i class="icofont icofont-error close-card"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-block table-border-style">
                                <div class="table-responsive">
                                    <table class="table table-inverse">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Numero</th>
                                                <th>Categorie</th>
                                                <th>Disponibilité</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($hotels)
                                                @foreach ($cle_chambres as $cle_chambre)
                                                    <tr>
                                                        <th scope="row">{{ $cle_chambre->id_cle_chambre }}</th>
                                                        <td>{{ $cle_chambre->cle_numero }}</td>
                                                        <td>{{ $cle_chambre->categorie }}</td>
                                                        @foreach ($cle_chambresGet as $cle_chambresGets)
                                                            @if ($cle_chambresGets->id_cle_chambre === $cle_chambre->id_cle_chambre)
                                                                <td
                                                                    @if ($cle_chambresGets->active === '1') class="bg-primary"
                                                    @else
                                                     class="bg-danger" @endif>
                                                                    @if ($cle_chambresGets->active === '1')
                                                                        Disponible
                                                                    @else
                                                                        Non Disponible
                                                                    @endif
                                                       
                                                                </td>
                                                                <td>
                                                            @endif
                                                        @endforeach
                                                        <a
                                                            href="{{ url('ModifCleChambre/' . $cle_chambre->id_cle_chambre) }}"><button
                                                                class="btn btn-primary btn-icon"><i
                                                                    class="ti-pencil"></i></button></a>

                                                        <a
                                                            href="{{ url('SaveCleChambreActive/' . $cle_chambre->id_cle_chambre) }}">

                                                            <button
                                                                @foreach ($cle_chambresGet as $cle_chambresGets)
                                                            @if ($cle_chambresGets->id_cle_chambre === $cle_chambre->id_cle_chambre)
                                                            @if ($cle_chambresGets->active === '1')
                                                            class="btn btn-primary"
                                                           @else
                                                           class="btn btn-danger"
                                                           @endif
                                                            @endif
                                                            @endforeach

                                                           > @foreach ($cle_chambresGet as $cle_chambresGets)
                                                           @if ($cle_chambresGets->id_cle_chambre === $cle_chambre->id_cle_chambre)
                                                            @if ($cle_chambresGets->active === '1')
                                                           Desactiver
                                                       @else
                                                          Activer
                                                       @endif
                                                       @endif
                                                       @endforeach</button>


                                                        </a>

                                                        </td>

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
