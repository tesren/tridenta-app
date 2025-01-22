<div>
    
    <nav class="navbar bg-darkblue sticky-top navbar-dark navbar-expand-xl">

        <div class="container-fluid">
    
            <a class="navbar-brand" href="{{ route('home', ['contact'=>$contact] ) }}" wire:navigate>
                <img width="200px" src="{{asset('img/tridenta-full-logo.webp')}}" alt="Logo de Tridenta Towers">
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
    
                    <ul class="navbar-nav justify-content-end justify-content-lg-center flex-grow-1 pe-3">
    
                        <li class="nav-item me-4">
                            <a class="nav-link" href="{{ route('home', ['contact'=>$contact] ) }}" wire:navigate>
                                {{__('Inicio')}}
                            </a>
                        </li>
    
                        <li class="nav-item me-4">
                            <a class="nav-link" href="{{ route('inventory.bay', ['contact'=>$contact] ) }}" wire:navigate>
                                {{__('Inventario')}}
                            </a>
                        </li>

                        <li class="nav-item me-4">
                            <a class="nav-link" href="{{ route('search', ['contact'=>$contact] ) }}" wire:navigate>
                                {{__('Buscar')}}
                            </a>
                        </li>

                        @if ( count( App\Models\ConstructionUpdate::all() ) > 0 )
                            <li class="nav-item me-4">
                                <a class="nav-link" href="{{ route('construction', ['contact'=>$contact] ) }}" wire:navigate>
                                    {{__('Avances de Obra')}}
                                </a>
                            </li>
                        @endif
                        
                        @if ($contact != 'no')
                            <li class="nav-item me-4">
                                <a class="nav-link" href="{{ route('contact', ['contact'=>$contact] ) }}" wire:navigate>
                                    {{__('Contacto')}}
                                </a>
                            </li>
                        @endif
    
                    </ul>
    
                    <div class="d-flex">

                        @guest
                            <div class="align-self-center dropdown me-3">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-user"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" wire:navigate href="{{url('/login')}}">{{__('Iniciar Sesión')}}</a></li>
                                    <li><a class="dropdown-item" wire:navigate href="{{url('/register')}}">{{__('Regístrate')}}</a></li>
                                </ul>
                            </div>
                        @endguest

                        @php
                            $route = Route::currentRouteName();
                            $lang = app()->getLocale();
                        @endphp

                        @if ($lang == 'en')
                            @if($route != 'en.unit' and $route != 'es.livewire.update')

                                <a href="{{$url = route($route, request()->query(), true, 'es')}}" wire:navigate class="d-block align-self-center me-3" title="{{__('Cambiar idioma')}}">
                                    <img src="{{ asset('img/change-lang.webp') }}" alt="{{__('Cambiar idioma')}}" width="30px">
                                </a>
                            @else

                                <a class="d-block align-self-center me-3" title="{{__('Cambiar idioma')}}" wire:navigate href="{{$url = route('unit', ['name'=>$unit_name, 'utm_campaign' => request()->query('utm_campaign'), 'utm_source' => request()->query('utm_source'), 'utm_medium' => request()->query('utm_medium')], true, 'es');}}">
                                    <img src="{{ asset('img/change-lang.webp') }}" alt="{{__('Cambiar idioma')}}" width="30px">
                                </a>

                            @endif
                        
                        @else
                            @if($route != 'es.unit' and $route != 'es.livewire.update')

                                <a href="{{$url = route($route, request()->query(), true, 'en')}}" wire:navigate class="d-block align-self-center me-3" title="{{__('Cambiar idioma')}}">
                                    <img src="{{ asset('img/change-lang.webp') }}" alt="{{__('Cambiar idioma ')}} " width="30px">
                                </a>

                            @else
                                
                                <a class="d-block align-self-center me-3" title="{{__('Cambiar idioma')}}" wire:navigate href="{{$url = route('unit', ['name'=>$unit_name, 'utm_campaign' => request()->query('utm_campaign'), 'utm_source' => request()->query('utm_source'), 'utm_medium' => request()->query('utm_medium')], true, 'en');}}">
                                    <img src="{{ asset('img/change-lang.webp') }}" alt="{{__('Cambiar idioma')}}" width="30px">
                                </a>

                            @endif
                        @endif

                    </div>
    
                </div>
            </div>
    
        </div>
    </nav>

</div>