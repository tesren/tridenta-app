<nav class="navbar bg-darkblue sticky-top d-flex d-lg-none navbar-dark">

    <div class="container-fluid">

        <a class="navbar-brand col-5" href="{{ route('dashboard.home') }}">
            <img src="{{asset('img/tridenta-full-logo.webp')}}" alt="Logo de Tridenta Towers" class="w-100">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

            <div class="offcanvas-header bg-darkblue">
                <div class="offcanvas-title" id="offcanvasNavbarLabel">
                    <img src="{{asset('img/tridenta-full-logo.webp')}}" alt="Logo de Tridenta Towers" class="w-50">
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body bg-darkblue position-relative">

                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('dashboard.home') }}">
                            <i class="fa-solid fa-house-chimney me-2"></i>{{__('Inicio')}}
                        </a>
                    </li>

                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{route('dashboard.inventory')}}">
                            <svg width="18" class="me-2" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18.4615 1.84615H5.53846C5.29365 1.84615 5.05886 1.7489 4.88575 1.57579C4.71264 1.40268 4.61538 1.16789 4.61538 0.923077C4.61538 0.678262 4.71264 0.443474 4.88575 0.270363C5.05886 0.0972527 5.29365 0 5.53846 0H18.4615C18.7064 0 18.9411 0.0972527 19.1143 0.270363C19.2874 0.443474 19.3846 0.678262 19.3846 0.923077C19.3846 1.16789 19.2874 1.40268 19.1143 1.57579C18.9411 1.7489 18.7064 1.84615 18.4615 1.84615ZM20.3077 4.61538H3.69231C3.44749 4.61538 3.2127 4.51813 3.03959 4.34502C2.86648 4.17191 2.76923 3.93712 2.76923 3.69231C2.76923 3.44749 2.86648 3.2127 3.03959 3.03959C3.2127 2.86648 3.44749 2.76923 3.69231 2.76923H20.3077C20.5525 2.76923 20.7873 2.86648 20.9604 3.03959C21.1335 3.2127 21.2308 3.44749 21.2308 3.69231C21.2308 3.93712 21.1335 4.17191 20.9604 4.34502C20.7873 4.51813 20.5525 4.61538 20.3077 4.61538ZM21.4113 22.1538H2.58865C1.90233 22.1531 1.24434 21.8801 0.759042 21.3948C0.273741 20.9095 0.000763511 20.2515 0 19.5652V8.12712C0.000763511 7.4408 0.273741 6.78281 0.759042 6.2975C1.24434 5.8122 1.90233 5.53923 2.58865 5.53846H21.4113C22.0977 5.53923 22.7557 5.8122 23.241 6.2975C23.7263 6.78281 23.9992 7.4408 24 8.12712V19.5652C23.9992 20.2515 23.7263 20.9095 23.241 21.3948C22.7557 21.8801 22.0977 22.1531 21.4113 22.1538Z" fill="white"/>
                            </svg>
                            {{__('Inventario')}}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('dashboard.saved.units', ['id'=>auth()->user()->id]) }}"><i class="fa-solid fa-heart me-2"></i>{{__('Favoritos')}}</a>
                    </li> --}}

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('dashboard.profile')}}"><i class="fa-solid fa-user me-2"></i>{{__('Mi Perfil')}}</a>
                    </li>

                </ul>

                <div class="text-center position-absolute bottom-0 start-0 end-0 w-100 mb-3">
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button type="submit" class="btn link-light">
                            <i class="fa-solid fa-right-from-bracket me-2"></i>{{__('Cerrar Sesión')}}
                        </button>
                    </form>
                </div>

            </div>
        </div>

    </div>
</nav>