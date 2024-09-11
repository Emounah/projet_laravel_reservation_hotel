    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">

                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        <a class="mobile-search morphsearch-search" href="#">
                            <i class="ti-search"></i>
                        </a>
                        <a href="index.html">
                            Mada Hotel
                        </a>
                        <a class="mobile-options">
                            <i class="ti-more"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a>
                                </div>
                            </li>

                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">

                            <li class="user-profile header-notification">
                                <a href="#!">
                                    <span>John Doe</span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                    <li>
                                        <a href="#!">
                                            <i class="ti-settings"></i> Modifier Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="auth-normal-sign-in.html">
                                            <i class="ti-layout-sidebar-left"></i> Deconnexion
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i
                                    class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="active">
                                    <a href="{{ url('/admin_index') }}">
                                        <span class="pcoded-micon"><i
                                                class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext"
                                            data-i18n="nav.dash.main">Tableau
                                            de bord</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i
                                                class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext"
                                            data-i18n="nav.basic-components.main">Produits</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="{{ Route('products_admin') }}">
                                                <span
                                                    class="pcoded-micon"><i
                                                        class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext"
                                                    data-i18n="nav.basic-components.alert">Listes</span>
                                                <span
                                                    class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        {{-- <li class=" ">
                                            <a href="{{ Route('ajout_products') }}">
                                                <span
                                                    class="pcoded-micon"><i
                                                        class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext"
                                                    data-i18n="nav.basic-components.breadcrumbs">Ajout</span>
                                                <span
                                                    class="pcoded-mcaret"></span>
                                            </a>
                                        </li> --}}

                                    </ul>
                                   <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)">
                                            <span class="pcoded-micon"><i
                                                    class="ti-layout-grid2-alt"></i></span>
                                            <span class="pcoded-mtext"
                                                data-i18n="nav.basic-components.main">Prix</span>
                                            <span
                                                class="pcoded-mcaret"></span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class=" ">
                                                <a href="{{ Route('prix') }}">
                                                    <span
                                                        class="pcoded-micon"><i
                                                            class="ti-angle-right"></i></span>
                                                    <span
                                                        class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.alert">Modifier</span>
                                                    <span
                                                        class="pcoded-mcaret"></span>
                                                </a>
                                            </li>

                                        </ul>
                                    </li>

                                    {{--  <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)">
                                            <span class="pcoded-micon"><i
                                                    class="ti-layout-grid2-alt"></i></span>
                                            <span class="pcoded-mtext"
                                                data-i18n="nav.basic-components.main">Fonction</span>
                                            <span
                                                class="pcoded-mcaret"></span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class=" ">
                                                <a href="{{ Route('liste_fonction') }}">
                                                    <span
                                                        class="pcoded-micon"><i
                                                            class="ti-angle-right"></i></span>
                                                    <span
                                                        class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.alert">Listes</span>
                                                    <span
                                                        class="pcoded-mcaret"></span>
                                                </a>
                                            </li>
                                            <li class=" ">
                                                <a href="{{ Route('ajout_fonction') }}">
                                                    <span
                                                        class="pcoded-micon"><i
                                                            class="ti-angle-right"></i></span>
                                                    <span
                                                        class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.breadcrumbs">Ajout</span>
                                                    <span
                                                        class="pcoded-mcaret"></span>
                                                </a>
                                            </li>

                                        </ul>
                                    </li>

                                    <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)">
                                            <span class="pcoded-micon"><i
                                                    class="ti-layout-grid2-alt"></i></span>
                                            <span class="pcoded-mtext"
                                                data-i18n="nav.basic-components.main">Employés</span>
                                            <span
                                                class="pcoded-mcaret"></span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class=" ">
                                                <a href="{{ Route('liste_employe') }}">
                                                    <span
                                                        class="pcoded-micon"><i
                                                            class="ti-angle-right"></i></span>
                                                    <span
                                                        class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.alert">Listes</span>
                                                    <span
                                                        class="pcoded-mcaret"></span>
                                                </a>
                                            </li>
                                            <li class=" ">
                                                <a href="{{ Route('ajout_employe') }}">
                                                    <span
                                                        class="pcoded-micon"><i
                                                            class="ti-angle-right"></i></span>
                                                    <span
                                                        class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.breadcrumbs">Ajout</span>
                                                    <span
                                                        class="pcoded-mcaret"></span>
                                                </a>
                                            </li>

                                        </ul>
                                    </li>

                                    <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)">
                                            <span class="pcoded-micon"><i
                                                    class="ti-layout-grid2-alt"></i></span>
                                            <span class="pcoded-mtext"
                                                data-i18n="nav.basic-components.main">Payment</span>
                                            <span
                                                class="pcoded-mcaret"></span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class=" ">
                                                <a href="{{ Route('liste_payment') }}">
                                                    <span
                                                        class="pcoded-micon"><i
                                                            class="ti-angle-right"></i></span>
                                                    <span
                                                        class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.alert">Listes</span>
                                                    <span
                                                        class="pcoded-mcaret"></span>
                                                </a>
                                            </li>
                                            <li class=" ">
                                                <a href="{{ Route('ajout_payment') }}">
                                                    <span
                                                        class="pcoded-micon"><i
                                                            class="ti-angle-right"></i></span>
                                                    <span
                                                        class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.breadcrumbs">Ajout</span>
                                                    <span
                                                        class="pcoded-mcaret"></span>
                                                </a>
                                            </li>

                                        </ul>
                                    </li>

                                    <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)">
                                            <span class="pcoded-micon"><i
                                                    class="ti-layout-grid2-alt"></i></span>
                                            <span class="pcoded-mtext"
                                                data-i18n="nav.basic-components.main">Clé de Payment</span>
                                            <span
                                                class="pcoded-mcaret"></span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class=" ">
                                                <a href="{{ Route('liste_cle_payment') }}">
                                                    <span
                                                        class="pcoded-micon"><i
                                                            class="ti-angle-right"></i></span>
                                                    <span
                                                        class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.alert">Listes</span>
                                                    <span
                                                        class="pcoded-mcaret"></span>
                                                </a>
                                            </li>
                                            <li class=" ">
                                                <a href="{{ Route('ajout_cle_payment') }}">
                                                    <span
                                                        class="pcoded-micon"><i
                                                            class="ti-angle-right"></i></span>
                                                    <span
                                                        class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.breadcrumbs">Ajout</span>
                                                    <span
                                                        class="pcoded-mcaret"></span>
                                                </a>
                                            </li>

                                        </ul>
                                    </li> --}}
                                </li>
                            </ul>
                        </div>
                    </nav>
