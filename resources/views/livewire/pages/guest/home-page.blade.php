<div>
    @section('titles')
        <title>Tridenta Towers - {{__('Condominios en preventa frente al mar en Puerto Vallarta')}}</title>
        <meta name="description" content="{{__('Descubre Tridenta Towers, de los creadores de Harbor171, condominios frente al mar en la zona hotelera de Puerto Vallarta. Estos exclusivos condominios en preventa ofrecen un estilo de vida único con vistas panorámicas, amenidades de lujo y acceso directo a la playa. ¡Aprovecha los precios de preventa y asegura tu lugar en esta icónica torre de condominios en el paraíso!')}}">
    @endsection

    @php
        $contact = request()->query('contact');
    @endphp

    <section class="position-relative mb-6">

        <img src="{{asset('img/beach-club.jpg')}}" alt="Áreas comunes de Tridenta Towers" class="w-100" style="height: 66vh; object-fit:cover; object-position:bottom;">

        <div class="bg-black-gradient"></div>

        <div class="row position-absolute bottom-0 start-0">

            <div class="col-12 col-lg-7 col-xxl-6 ms-0 ms-lg-5 mb-5 text-white">
                <h1 class="fw-bold fs-0">
                    {{__('Nueva')}} <br>
                    {{__('Preventa a pie')}} <br>
                    {{__('de playa')}}
                </h1>
                {{-- <div class="fw-light fs-5">{{__('Bienvenido a la preventa privada')}}</div> --}}
            </div>

        </div>

    </section>

    {{-- Descripción --}}
    <section class="row justify-content-evenly position-relative mb-6">

        <div class="col-12 col-lg-5 text-darkblue">
            <h2>{{__('Condominios frente al mar')}}</h2>
            <p>
                {{__('Descubra nuestros 11 tipos de unidades de hasta')}} 144.54m².<br><br>
                {{__('Con una excelente ubicación en Puerto Vallarta, uno de los mejores destinos turísticos de México, con vista al océano e increíbles amenidades.')}}
            </p>
        </div>

        <div class="col-12 col-lg-4 text-center align-self-center">
            <div class="mb-2">{{__('Revisa las unidades que tenemos para ti.')}}</div>
            <a href="{{route('inventory.bay', request()->query() )}}" wire:navigate class="btn btn-blue px-5 my-4 my-lg-0">{{__('Ver Inventario')}}</a>
        </div>

        <div class="text-center mt-4 mt-lg-5">
            <a href="#gallery-section" class="link-blue text-decoration-none">
                <i class="fa-solid fa-2x fa-bounce fa-chevron-down"></i>
            </a>
        </div>

    </section>

    {{-- Galería --}}
    <section class="row mb-6" title="{{__('Galería')}}" id="gallery-section">

        <div class="col-12 col-lg-8 p-1 position-relative">
            <img src="{{asset('/img/lobby-tridenta.jpeg')}}" alt="Vista Aerea Tridenta Towers" class="w-100" style="height: 400px; object-fit:cover;" data-fancybox="gallery">
            <div class="fs-1 position-absolute bottom-0 start-0 text-white ms-5 mb-4 fw-bold" style="text-shadow: 1px 1px 2px black;">
                {{__('Galería')}}
            </div>
            <hr class="position-absolute bottom-0 start-0 end-0 w-100 mb-4 text-white opacity-100">
        </div>

        <div class="col-6 col-lg-4 p-1">
            <img src="{{asset('/img/beach-club-pools-tridenta.jpeg')}}" alt="Motor Lobby Tridenta Towers" class="w-100" style="height: 400px; object-fit:cover;" data-fancybox="gallery">
        </div>


        <div class="col-6 col-lg-4 p-1">
            <img src="{{asset('/img/tennis-tridenta.jpeg')}}" alt="Vista Trasera Tridenta Towers" class="w-100" style="height: 400px; object-fit:cover;" data-fancybox="gallery">
        </div>

        <div class="col-12 col-lg-8 p-1 position-relative">
            <img src="{{asset('/img/pool-tridenta.jpeg')}}" alt="Amenidades de Tridenta Towers" class="w-100" style="height: 400px; object-fit:cover; object-position:top;" data-fancybox="gallery">
            <div class="fs-1 position-absolute bottom-0 end-0 text-white me-3 me-lg-5 mb-4 fw-bold">
                <a href="#gallery-1" class="btn btn-light rounded-0 shadow-5"><i class="fa-regular fa-images"></i> {{__('Galería Completa')}}</a>
            </div>
        </div>

        
        <img src="{{asset('/img/inventory-sierra-new.webp')}}" alt="Galería Tridenta Towers" class="d-none" data-fancybox="gallery">   
        <img src="{{asset('/img/inventory-bahia.webp')}}" alt="Galería Tridenta Towers" class="d-none" data-fancybox="gallery">
        <img src="{{asset('img/vista-aerea.jpg ')}}" alt="Galería Tridenta Towers" class="d-none" data-fancybox="gallery">   
        

        <div class="fs-7 text-secondary text-center">{{__('Las imagenes son con fines ilustrativos. Precios y dimensiones pueden cambiar sin previo aviso.')}}</div>
        
    </section>

    {{-- Amenidades --}}
    <section class="container text-darkblue mb-6">
        <h3>{{__('Amenidades')}}</h3>
        <p>{{__('Pasa los mejores momentos frente a la playa con tu familia en las amenidades que tenemos para ti.')}}</p>

        <div class="row text-center">
            <div class="col me-4 mb-3">
                <i class="fa-solid fa-3x fa-person-swimming"></i>
                <div class="fs-6 fw-light">{{__('Alberca')}}</div>
            </div>

            <div class="col me-4 mb-3">
                <i class="fa-solid fa-3x fa-water-ladder"></i>
                <div class="fs-6 fw-light">{{__('Beach club')}}</div>
            </div>

            <div class="col me-4 mb-3">
                <i class="fa-solid fa-3x fa-leaf"></i>
                <div class="fs-6 fw-light">{{__('Áreas verdes')}}</div>
            </div>

            <div class="col me-4 mb-3">
                <i class="fa-solid fa-3x fa-user-tie"></i>
                <div class="fs-6 fw-light">{{__('Lobby')}}</div>
            </div>
            
            {{-- <div class="col me-4 mb-3">
                <i class="fa-regular fa-3x fa-sun"></i>
                <div class="fs-6 fw-light">{{__('Asoleadero')}}</div>
            </div> --}}
            {{-- 
            <div class="col me-4 mb-3">
                <i class="fa-solid fa-3x fa-water"></i>
                <div class="fs-6 fw-light">{{__('Río lento')}}</div>
            </div>

            <div class="col me-4 mb-3">
                <i class="fa-solid fa-3x fa-utensils"></i>
                <div class="fs-6 fw-light">{{__('Restaurante')}}</div>
            </div> --}}

            {{-- <div class="col me-4 mb-3">
                <i class="fa-solid fa-3x fa-children"></i>
                <div class="fs-6 fw-light">{{__('Área para niños')}}</div>
            </div> --}}

            <div class="col me-4 mb-3">
                <i class="fa-solid fa-3x fa-dumbbell"></i>
                <div class="fs-6 fw-light">{{__('Gimnasio')}}</div>
            </div>

            {{-- <div class="col me-4 mb-3">
                <i class="fa-solid fa-3x fa-dog"></i>
                <div class="fs-6 fw-light">{{__('Parque para Mascotas')}}</div>
            </div> --}}
            
        </div>

    </section>

    {{-- Tipos de Unidades --}}
    <section class="row container text-darkblue mb-6">
        <h3>{{__('Tipos de Unidades')}}</h3>

        @php
            $i=1;
        @endphp

        @foreach ($unit_types as $type)

            @php
                $blueprints = $type->getMedia('blueprints');
            @endphp

            <div class="col-12 col-lg-4 mb-3 mb-lg-4 p-2 position-relative text-center">
                <img src="{{ $blueprints[0]->getUrl('medium') }}" alt="Tipo de Unidad Tridenta" data-fancybox="unit-types" class="w-100 object-fit-cover" style="height: 400px;">
                <a href="#unit-types-{{$i}}" class="unit-type-hover d-flex justify-content-center text-decoration-none w-100">
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
                </a>
            </div>

            @php
                $i++;
            @endphp

        @endforeach

        <div class="col-12 text-center align-self-center">
            <div class="mb-2">{{__('Revisa las unidades que tenemos para ti.')}}</div>
            <a href="{{route('inventory.bay', request()->query() )}}" wire:navigate class="btn btn-blue px-5">{{__('Ver Inventario')}}</a>
        </div>

    </section>

    {{-- Master Plan --}}
    <section class="container mb-6">
        <h3 class="fs-1">{{__('Master Plan')}}</h3>

        <div id="carouselMasterPlan" class="carousel slide carousel-dark">

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('/img/master-plan-common-areas.jpg')}}" alt="Master Plan de Tridenta Towers" class="w-100" data-fancybox="master-plan" loading="lazy">
                </div>

                <div class="carousel-item">
                    <img src="{{asset('/img/master-plan-lvl-1.jpg')}}" alt="Áreas comunes de Tridenta Towers" class="w-100" data-fancybox="master-plan" loading="lazy">
                </div>

                <div class="carousel-item">
                    <img src="{{asset('/img/master-plan-nivel-3-tridenta.jpg')}}" alt="Master plan nivel 3 Tridenta Towers" class="w-100" data-fancybox="master-plan" loading="lazy">
                </div>

                <div class="carousel-item">
                    <img src="{{asset('/img/master-plan-balcony-units.jpg')}}" alt="Rooftops de Tridenta Towers" class="w-100" data-fancybox="master-plan" loading="lazy">
                </div>

                <div class="carousel-item">
                    <img src="{{asset('/img/master-plan-rooftop.jpg')}}" alt="Rooftops de Tridenta Towers" class="w-100" data-fancybox="master-plan" loading="lazy">
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselMasterPlan" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselMasterPlan" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        {{-- <div class="text-center">
            <a href="#" download="" class="btn btn-blue px-5">{{__('Descargar')}}</a>
        </div> --}}
    </section>

    {{-- Lista de acabados --}}
    {{-- <section class="row justify-content-evenly container mb-6">

        <div class="col-12 col-lg-5 p-2 shadow-5">
            <img src="{{asset('img/specs-'.app()->getLocale().'.jpg')}}" alt="{{'Lista de acabados y especificaciones de Tridenta Towers'}}" class="w-100" data-fancybox="const-specs">
        </div>

        <div class="col-12 col-lg-4 align-self-center">
            <h3 class="mb-3">{{__('Especificaciones de construcción y acabados')}}</h3>
            <p class="mb-4">{{__('Da clic en la imagen o en el botón para ver la lista completa de especificaciones de construcción y acabados de Tridenta Towers.')}}</p>
            <a href="#const-specs" class="btn btn-blue">{{__('Ver especificaciones')}}</a>
        </div>

    </section> --}}

    {{-- Ubicación --}}
    <section class="container row justify-content-evenly mb-6">

        <div class="col-12 col-lg-4 align-self-center">
            <h4 class="fs-3">{{__('Ubicación')}}</h4>
            <address>Febronio Uribe 170, Zona Hotelera, Las Glorias, 48333 Puerto Vallarta, Jal.</address>
            <p>{{__('Tridenta Towers ofrece una ubicación excepcional frente al mar. Con vistas impresionantes y acceso directo a las cálidas aguas del Pacífico, es el lugar ideal para aquellos que buscan vivir la experiencia única de la vida frente al mar en uno de los destinos más codiciados de México.')}}</p>
        </div>

        <div class="col-12 col-lg-7">
            <img src="{{asset('img/mapa-tridenta.webp')}}" alt="Ubicación de Tridenta Towers Vallarta" class="w-100">
        </div>

    </section>

    {{-- Plan de pago --}}
    <section class="position-relative">

        <img src="{{asset('/img/street.jpg')}}" alt="Tridenta Towers" class="w-100 object-fit-cover" style="max-height: 85vh; object-position:bottom">

        <div class="row justify-content-center position-absolute top-0 start-0 h-100">
            
            <div class="col-12 col-lg-6 col-xxl-5 align-self-center bg-white p-0 text-center shadow-5">

                <div id="carouselPayplans" class="carousel slide carousel-dark p-4 p-lg-5">

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
                                    <div class="mb-4">{{$plan->second_payment}}% {{ __('A los :months meses después de la firma de contrato.', ['months'=>$plan->second_payment_months] ) }}</div>
                                @endisset

                                @isset($plan->third_payment)
                                    <div class="mb-4">{{$plan->third_payment}}% {{ __('A los :months meses después de la firma de contrato.', ['months'=>$plan->third_payment_months] ) }}</div>
                                @endisset

                                @isset($plan->months_percent)
                                    <div class="mb-4">{{$plan->months_percent}}% {{__('en :months pagos mensuales.', ['months'=>$plan->monthly_payments] )}}</div>
                                @endisset

                                @isset($plan->closing_payment)
                                    <div class="mb-4">{{$plan->closing_payment}}% {{__('a la entrega física de la propiedad.')}}</div>
                                @endisset

                                <a href="{{route('inventory.bay', request()->query() )}}" wire:navigate class="btn btn-blue mb-3">{{__('Ver Inventario')}}</a>

                                <p class="mb-0 fs-7 fw-light">{{__('Precios, descuentos y condiciones de pago sujetos a cambios sin previo aviso.')}}</p>
                
                            </div>

                            @php $i++; @endphp
                        @endforeach
                        
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselPayplans" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#carouselPayplans" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                </div>

            </div>
        </div>

    </section>

    @livewire('contact-form')

    @script
        <script>
            Fancybox.bind("[data-fancybox]", {
                // Your custom options
            });
        </script>
    @endscript

</div>