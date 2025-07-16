<header class="header-with-topbar">
            <!-- start header top bar -->
            <div class="header-top-bar top-bar-dark bg-very-light-gray">
                <div class="container-fluid">
                    <div class="row h-45px xs-h-auto align-items-center m-0 xs-pt-5px xs-pb-5px">
                        <div class="col-lg-6 col-md-7 text-center text-md-start xs-px-0">
                            <div class="fs-15 text-dark-gray fw-500">Nos experts en recrutement vous attendent ! <a href="demo-accounting-contact.html" class="text-dark-gray text-decoration-line-bottom fw-600">Contactez-nous</a></div>
                        </div>
                        <div class="col-lg-6 col-md-5 text-end d-none d-md-flex">
                            <div class="widget fs-15 fw-500 me-35px lg-me-25px md-me-0 text-dark-gray"><a href="tel:02228899900"><i class="feather icon-feather-phone-call"></i>+212-641529683</a></div>
                            <div class="widget fs-15 fw-500 text-dark-gray d-none d-lg-inline-block"><i class="feather icon-feather-map-pin"></i>Tanger, Maroc.</div> 
                        </div>
                    </div>
                </div>
            </div>
            <!-- end header top bar -->
            <!-- start navigation -->
            <nav class="navbar navbar-expand-lg header-light bg-white responsive-sticky">
                <div class="container-fluid">
                    <div class="col-auto col-lg-2 me-lg-0 me-auto">
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <img src="{{asset('img/logo-h.png')}}" data-at2x="{{asset('img/logo-h.png')}}" alt="" class="default-logo">
                            <img src="{{asset('img/logo-h.png')}}" data-at2x="{{asset('img/logo-h.png')}}" alt="" class="alt-logo">
                            <img src="{{asset('img/logo-h.png')}}" data-at2x="{{asset('img/logo-h.png')}}" alt="" class="mobile-logo"> 
                        </a>
                    </div>
                    <div class="col-auto menu-order position-static">
                        <button class="navbar-toggler float-start" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
                            <span class="navbar-toggler-line"></span>
                            <span class="navbar-toggler-line"></span>
                            <span class="navbar-toggler-line"></span>
                            <span class="navbar-toggler-line"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav"> 
                            <ul class="navbar-nav fw-600">
                                <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Accueil</a></li> 
                                <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">Notre société</a></li>
                                <li class="nav-item dropdown dropdown-with-icon-style02">
                                    <a href="#" class="nav-link">Nos projets</a>
                                    <i class="fa-solid fa-angle-down dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"> 
                                        <li><a href="demo-accounting-services-details.html"><img src="{{ asset('img/demo-accounting-company-icon02.svg')}}" alt="">Corporate finance</a></li>
                                        <li><a href="demo-accounting-services-details.html"><img src="{{ asset('img/demo-accounting-company-icon03.svg')}}" alt="">Financial services</a></li>
                                        <li><a href="demo-accounting-services-details.html"><img src="{{ asset('img/demo-accounting-company-icon-04.svg')}}" alt="">Online consulting</a></li>
                                        <li><a href="demo-accounting-services-details.html"><img src="{{ asset('img/demo-accounting-company-icon-05.svg')}}" alt="">Investment consulting</a></li>
                                        <li><a href="demo-accounting-services-details.html"><img src="{{ asset('img/demo-accounting-company-icon-06.svg')}}" alt="">Banking and financing</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a href="demo-accounting-process.html" class="nav-link">Offres d'emploi</a></li>
                                <li class="nav-item"><a href="demo-accounting-news.html" class="nav-link">News</a></li> 
                                <li class="nav-item"><a href="demo-accounting-contact.html" class="nav-link">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-auto col-lg-2 text-end d-none d-sm-flex">
                        <div class="header-icon"> 
                            <div class="header-button">
                                <a href="{{ route('dashboard') }}" class="btn btn-small btn-rounded btn-base-color btn-box-shadow">Espace de Gestion</a>
                            </div>
                        </div>  
                    </div>
                </div>
            </nav>
            <!-- end navigation -->
        </header>