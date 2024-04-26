@extends('layouts.admin-base')

@section('titles')
    <title>{{__('Inicio - Tridenta Towers')}}</title>
@endsection

@section('content')

    <section class="position-relative mb-6">

        <img src="{{asset('img/tridenta-home.jpg')}}" alt="Áreas comunes de Tridenta Towers" class="w-100" style="height: 66vh; object-fit:cover; object-position:bottom;">

        <div class="bg-black-gradient"></div>

        <div class="row position-absolute bottom-0 start-0">

            <div class="col-12 col-lg-6 ms-0 ms-lg-5 mb-5 text-white">
                <h1 class="fw-bold fs-0">
                    {{__('Nuevas')}} <br>
                    {{__('Torres a pie')}} <br>
                    {{__('de playa')}}
                </h1>
                <div class="fw-light fs-5">{{__('Bienvenido a la preventa privada')}}</div>
            </div>

        </div>

    </section>

    {{-- Descripción --}}
    <section class="row justify-content-evenly position-relative mb-6">

        <div class="col-12 col-lg-5 text-darkblue">
            <h2>{{__('Primera fase')}}</h2>
            <p>
                {{__('Descubra nuestros 6 tipos de unidades de hasta 175.88 m².')}} <br><br>
                {{__('Con una excelente ubicación en Puerto Vallarta, uno de los mejores destinos turísticos de México, con vista al océano e increíbles amenidades.')}}
            </p>
        </div>

        <div class="col-12 col-lg-4 text-center align-self-center">
            <div class="mb-2">{{__('Revisa las unidades que tenemos para ti.')}}</div>
            <a href="{{route('dashboard.inventory')}}" class="btn btn-blue px-5 my-4 my-lg-0">{{__('Ver Inventario')}}</a>
        </div>

        <div class="text-center">
            <a href="#gallery-section" class="link-blue text-decoration-none">
                <i class="fa-solid fa-2x fa-bounce fa-chevron-down"></i>
            </a>
        </div>

    </section>

    {{-- Galería --}}
    <section class="row mb-6" title="{{__('Galería')}}" id="gallery-section">

        <div class="col-12 col-lg-8 p-1 position-relative">
            <img src="{{asset('img/gallery-1.webp')}}" alt="Vista Aerea Tridenta Towers" class="w-100" style="height: 400px; object-fit:cover;" data-fancybox="gallery">
            <div class="fs-1 position-absolute bottom-0 start-0 text-white ms-5 mb-4 fw-bold" style="text-shadow: 1px 1px 2px black;">
                {{__('Galería')}}
            </div>
            <hr class="position-absolute bottom-0 start-0 end-0 w-100 mb-4 text-white opacity-100">
        </div>

        <div class="col-6 col-lg-4 p-1">
            <img src="{{asset('img/gallery-2.webp')}}" alt="Motor Lobby Tridenta Towers" class="w-100" style="height: 400px; object-fit:cover;" data-fancybox="gallery">
        </div>


        <div class="col-6 col-lg-4 p-1">
            <img src="{{asset('img/gallery-3.webp')}}" alt="Vista Trasera Tridenta Towers" class="w-100" style="height: 400px; object-fit:cover;" data-fancybox="gallery">
        </div>

        <div class="col-12 col-lg-8 p-1 position-relative">
            <img src="{{asset('img/gallery-4.webp')}}" alt="Amenidades de Tridenta Towers" class="w-100" style="height: 400px; object-fit:cover;" data-fancybox="gallery">
            <div class="fs-1 position-absolute bottom-0 end-0 text-white me-3 me-lg-5 mb-4 fw-bold">
                <a href="#gallery-1" class="btn btn-light rounded-0 shadow-5"><i class="fa-regular fa-images"></i> {{__('Galería Completa')}}</a>
            </div>
        </div>

        @for ($i=5; $i<10; $i++)
            <img src="{{asset('img/gallery-'.$i.'.jpeg')}}" alt="Galería Tridenta Towers" class="d-none" data-fancybox="gallery">   
        @endfor

        <div class="fs-7 text-secondary text-center">{{__('Las imagenes son con fines ilustrativos. Precios y dimensiones pueden cambiar sin previo aviso.')}}</div>
        
    </section>

    {{-- Amenidades --}}
    <section class="container text-darkblue mb-6">
        <h3>{{__('Amenidades')}}</h3>
        <p>{{__('Pasa los mejores momentos frente a la playa con tu familia en las amenidades que tenemos para ti.')}}</p>

        <div class="row text-center">
            <div class="col me-4 mb-3">
                <i class="fa-solid fa-3x fa-person-swimming"></i>
                <div class="fs-6 fw-light">{{__('Alberca Infinita')}}</div>
            </div>

            <div class="col me-4 mb-3">
                <i class="fa-solid fa-3x fa-water-ladder"></i>
                <div class="fs-6 fw-light">{{__('Albercas para niños')}}</div>
            </div>

            <div class="col me-4 mb-3">
                <i class="fa-solid fa-3x fa-hot-tub-person"></i>
                <div class="fs-6 fw-light">{{__('Jacuzzi')}}</div>
            </div>
            
            <div class="col me-4 mb-3">
                <i class="fa-regular fa-3x fa-sun"></i>
                <div class="fs-6 fw-light">{{__('Asoleadero')}}</div>
            </div>

            <div class="col me-4 mb-3">
                <i class="fa-solid fa-3x fa-water"></i>
                <div class="fs-6 fw-light">{{__('Río lento')}}</div>
            </div>

            <div class="col me-4 mb-3">
                <i class="fa-solid fa-3x fa-utensils"></i>
                <div class="fs-6 fw-light">{{__('Restaurante')}}</div>
            </div>

            <div class="col me-4 mb-3">
                <i class="fa-solid fa-3x fa-children"></i>
                <div class="fs-6 fw-light">{{__('Área para niños')}}</div>
            </div>

            <div class="col me-4 mb-3">
                <i class="fa-solid fa-3x fa-dumbbell"></i>
                <div class="fs-6 fw-light">{{__('Área Wellness')}}</div>
            </div>

            <div class="col me-4 mb-3">
                <i class="fa-solid fa-3x fa-dog"></i>
                <div class="fs-6 fw-light">{{__('Parque para Mascotas')}}</div>
            </div>
            
        </div>

    </section>

    {{-- Tipos de Unidades --}}
    <section class="row container text-darkblue mb-6">
        <h3>{{__('Tipos de Unidades')}}</h3>

        @foreach ($unit_types as $type)

            @php
                $blueprints = $type->getMedia('blueprints');
            @endphp

            <div class="col-12 col-lg-4 mb-3 mb-lg-4 p-2 position-relative text-center">
                <img src="{{ $blueprints[0]->getUrl('medium') }}" alt="Tipo de Unidad Tridenta" class="w-100" style="height: 400px; object-fit: contain;">
                <div class="unit-type-hover d-flex justify-content-center">
                    <div class="text-center align-self-center fs-1">
                        {{__('Tipo')}} {{ $type->name }}
                        @if ($type->bedrooms < 1)
                            <div class="fs-5 fw-light">{{__('Estudio')}}</div>
                        @elseif($type->bedrooms == 1)
                            <div class="fs-5 fw-light">{{ $type->bedrooms }} {{__('Recámara')}} - {{$type->bathrooms}} {{__('Baños')}}</div> 
                        @else
                            <div class="fs-5 fw-light">{{ $type->bedrooms }} {{__('Recámaras')}} - {{$type->bathrooms}} {{__('Baños')}}</div> 
                        @endif
                    </div>
                </div>
            </div>

        @endforeach

        <div class="col-12 text-center align-self-center">
            <div class="mb-2">{{__('Revisa las unidades que tenemos para ti.')}}</div>
            <a href="{{route('dashboard.inventory')}}" class="btn btn-blue px-5">{{__('Ver Inventario')}}</a>
        </div>

    </section>

    {{-- Master Plan --}}
    <section class="container mb-6">
        <h3 class="fs-1">{{__('Master Plan')}}</h3>

        <img src="{{asset('img/master-plan.webp')}}" alt="Master Plan de Tridenta Towers" class="w-100" data-fancybox="master-plan">

        {{-- <div class="text-center">
            <a href="#" download="" class="btn btn-blue px-5">{{__('Descargar')}}</a>
        </div> --}}
    </section>

    {{-- Ubicación --}}
    <section class="container row mb-6">

        <div class="col-12 col-lg-4">
            <h4 class="fs-3">{{__('Ubicación')}}</h4>
            <address>Febronio Uribe 170, Zona Hotelera, Las Glorias, 48333 Puerto Vallarta, Jal.</address>
        </div>

        <div class="col-12 col-lg-8">
            <img src="{{asset('img/mapa-tridenta.webp')}}" alt="Ubicación de Tridenta Towers Vallarta" class="w-100">
        </div>

    </section>

    {{-- Plan de pago --}}
    <section class="position-relative">

        <img src="{{asset('img/tridenta-towers-bg.webp')}}" alt="Tridenta Towers" class="w-100">

        <div class="row justify-content-evenly position-absolute top-0 start-0 h-100">
            <div class="col-12 col-lg-4"></div>
    
            <div class="col-12 col-lg-4 align-self-center bg-white p-0 text-center shadow-5">

                <div id="carouselExample" class="carousel slide carousel-dark p-4 p-lg-5">

                    <div class="carousel-inner">

                        @php $i=0; @endphp
                        @foreach ($payment_plans as $plan)
                            <div class="carousel-item @if($i == 0) active @endif">
                                <h4 class="fs-2">{{__('Plan de Pago')}}</h4>
                                <div class="text-secondary mb-4">{{$plan->name}}</div>

                                @isset($plan->discount)
                                    <div class="mb-4">{{ $plan->discount }}% {{__('de Descuento.')}}</div>
                                @endisset

                                @isset($plan->down_payment)
                                    <div class="mb-4">{{$plan->down_payment}}% {{__('de enganche a la firma del contrato de promesa de compraventa.')}}</div>
                                @endisset

                                @isset($plan->second_payment)
                                    <div class="mb-4">{{$plan->second_payment}}% {{__('sesenta días después del enganche.')}}</div>
                                @endisset

                                @isset($plan->months_percent)
                                    <div class="mb-4">{{$plan->months_percent}}% {{__('en pagos mensuales.')}}</div>
                                @endisset

                                @isset($plan->closing_payment)
                                    <div class="mb-4">{{$plan->closing_payment}}% {{__('a la entrega física de la propiedad.')}}</div>
                                @endisset

                                <a href="{{route('dashboard.inventory')}}" class="btn btn-blue">{{__('Ver Inventario')}}</a>
                
                            </div>

                            @php $i++; @endphp
                        @endforeach
                        
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                </div>

            </div>
        </div>

    </section>

    {{-- @include('components.contact-form') --}}

@endsection