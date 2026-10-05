<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('media/favicon.png') }}" type="image/png">
    <title>Luca Chessa Ph</title>
    {{-- Google icon --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet">
    {{-- icone bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    {{-- aos --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <nav class="navbar navbar-expand-lg px-3 {{ $attributes->get('class') }}" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">
                <div class="row">
                    <div class="col display-4 playfair-display border-bottom border-2 border-white color-s">LC</div>
                    <div class="col d-flex flex-column justify-content-center">
                        <span class="fs-6 fw-semibold color-s">Luca Chessa</span>
                        <span class="fs-6 fw-semibold color-s">Photographer</span>
                    </div>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" aria-current="page"
                            href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"
                            href="{{ route('contact') }}">Contatti</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('photo.gallery') ? 'active' : '' }}"
                            href="{{ route('photo.gallery') }}">Galleria</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('portfolio.index') ? 'active' : '' }}"
                            href="{{ route('portfolio.index') }}">Portfolio</a>
                    </li>
                    @if (Auth::check() && Auth::user()->is_admin)
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('photo.create') ? 'active' : '' }}"
                                href="{{ route('photo.create') }}">Admin Galleria</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('portfolio.create') ? 'active' : '' }}"
                                href="{{ route('portfolio.create') }}">Admin Portfolio</a>
                        </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            @auth
                                Ciao {{ Auth::user()->name }}!
                            @else
                                Login/Registrati
                            @endauth
                        </a>
                        <ul class="dropdown-menu">
                            @guest
                                <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                                <li><a class="dropdown-item" href="{{ route('register') }}">Registrati</a></li>
                            @else
                                <li><a class="dropdown-item" href="#"
                                        onclick="event.preventDefault(); document.querySelector('#logout-form').submit();">Logout</a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @endguest
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{ $slot }}

    <footer class="bg-dark text-white pt-5 pb-4 pt-5 border-top border-2 border-white">
        <div class="container">

            <div class="row">

                <!-- Brand -->
                <div class="col-md-4 mb-4">
                    <h4 class="fw-light playfair-display color-s">Luca Chessa Photography</h4>
                    <p class="small text-white-50">
                        Catturo momenti, emozioni e storie attraverso la luce.
                    </p>
                </div>

                <!-- Quick Links -->
                <div class="col-md-4 mb-4">
                    <h5 class="fw-light playfair-display color-s">Link rapidi</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('portfolio.index') }}"
                                class="text-white-50 text-decoration-none">Portfolio</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">Chi sono</a></li>
                        <li><a href="{{ route('contact') }}" class="text-white-50 text-decoration-none">Contattaci</a>
                        </li>
                    </ul>
                </div>

                <!-- Mini Gallery -->
                <div class="col-md-4 mb-4">
                    <h5 class="fw-light playfair-display color-s">Mini Gallery</h5>
                    <div class="d-flex flex-wrap gap-2">
                        <img src="{{asset('media/hero.jpeg')}}" class="rounded" width="80" height="80"
                            alt="photo">
                        <img src="{{asset('media/hero2.jpeg')}}" class="rounded" width="80" height="80"
                            alt="photo">
                        <img src="{{asset('media/hero3.png')}}" class="rounded" width="80" height="80"
                            alt="photo">
                        <img src="{{asset('media/hero4.png')}}" class="rounded" width="80" height="80"
                            alt="photo">
                    </div>
                </div>

            </div>

            <hr class="border-secondary">

            <!-- Bottom -->
            <div class="text-center">
                <p class="small mb-1 color-s">© 2026 Luca Chessa Photography — Tutti i diritti riservati.</p>
                <div class="d-flex justify-content-center gap-3 fs-4">
                    <a href="https://www.instagram.com/lucachessa.pv/" class="text-white-50" target="_blanck"><i
                            class="bi bi-instagram color-s"></i></a>
                    <a href="{{ route('photo.gallery') }}" class="text-white-50"><i
                            class="bi bi-camera color-s"></i></a>
                </div>
            </div>

        </div>
    </footer>


    {{-- aos js --}}
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
