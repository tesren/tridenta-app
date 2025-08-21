<div>
    @section('titles')
        <title>Tridenta Towers - {{__('Condominios en preventa frente al mar en Puerto Vallarta')}}</title>
        <meta name="description" content="{{__('Descubre Tridenta Towers, de los creadores de Harbor171, condominios frente al mar en la zona hotelera de Puerto Vallarta. Estos exclusivos condominios en preventa ofrecen un estilo de vida único con vistas panorámicas, amenidades de lujo y acceso directo a la playa. ¡Aprovecha los precios de preventa y asegura tu lugar en esta icónica torre de condominios en el paraíso!')}}">
    @endsection

    @php
        $contact = request()->query('contact');
    @endphp

    <section class="position-relative mb-6">

        <img src="{{asset('img/home-img-new.jpg')}}" alt="Áreas comunes de Tridenta Towers" class="w-100" style="height: 84vh; object-fit:cover;">

        <div class="bg-black-gradient"></div>

        <div class="position-absolute start-0 translate-middle-y w-100" style="top: 40%;">
            <h1 class="fw-bold fs-0 text-center text-white mb-5 w-100">
                <div>{{__('Nueva')}} {{__('Preventa a pie')}} {{__('de playa')}}</div>
                <div class="fs-3 mt-3">{{__('Precios desde')}} ${{number_format($lowest_priced_unit->price, 2)}} {{$lowest_priced_unit->currency}}</div>
            </h1>
        </div>

        <div class="row position-absolute bottom-0 start-0">

            {{-- <div class="col-12 col-lg-7 col-xxl-6 ms-0 ms-lg-5 mb-5 text-white">
                <h1 class="fw-bold fs-0">
                    {{__('Nueva')}} <br>
                    {{__('Preventa a pie')}} <br>
                    {{__('de playa')}}
                </h1>
            </div> --}}

            <div class="col-12 px-0 px-lg-2" style="background-image: url('{{asset('/img/bg-july-promo.jpg')}}'); background-size: cover; background-repeat:no-repeat;">

                <div id="carouselJulyPromo" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">

                        <div class="carousel-item active">
                            <div class="row py-4 px-1 px-lg-4">
                                <div class="col-12 col-lg-4 align-self-center align-self-center">
                                    <div class="fw-regular fs-1 mb-1 fw-bold lh-1">{{__('Promoción')}}</div>
                                    <div class="fw-light fs-4 text-uppercase lh-1">{{__('Por tiempo limitado')}}</div>
                                </div>

                                <div class="col-12 col-lg-4 align-self-center my-4 my-lg-0">
                                    
                                    <div class="fs-3 lh-sm text-center"> 
                                        <div class="">{{__('Obtén hasta un')}}</div>
                                        <div class="fw-bold">15% {{__('de descuento')}}</div>
                                    </div>
                                        
                                </div>

                                <div class="col-12 col-lg-4 text-end align-self-center fs-4">
                                    <img src="{{asset('/img/domus-logo-blue.svg')}}" alt="Logo Domus Vallarta" class="img-fluid">
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="row py-4 px-1 px-lg-4">
                                <div class="col-12 col-lg-4 align-self-center align-self-center">
                                    <div class="fw-regular fs-1 mb-1 fw-bold lh-1">{{__('Promoción')}}</div>
                                    <div class="fw-light fs-3 text-uppercase lh-1">{{__('Por tiempo limitado')}}</div>
                                </div>

                                <div class="col-12 col-lg-5 text-center my-4 my-lg-0">

                                    <div class="fs-4">{{__('Aparta con solo 10% de enganche y')}}</div>
                                    <div class="fw-bold fs-4">{{__('tu siguiente pago hasta inicio de obra')}}</div>
                                            
                                </div>

                                <div class="col-12 col-lg-3 text-end align-self-center fs-4">
                                    <img src="{{asset('/img/domus-logo-blue.svg')}}" alt="Logo Domus Vallarta" class="img-fluid">
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    {{-- Descripción --}}
    <section class="row justify-content-evenly position-relative mb-6">

        <div class="col-12 col-lg-5 text-darkblue">
            <h2>{{__('Condominios frente al mar')}}</h2>
            <p>
                {{__('Descubra nuestros 5 tipos de unidades que van desde :minsize m² hasta :maxsize', [ 'minsize'=>42.44, 'maxsize'=>149.45 ]) }}.<br><br>
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
            <img src="{{asset('/img/albercas-newer.webp')}}" alt="Vista Aerea Tridenta Towers" class="w-100" style="height: 400px; object-fit:cover;" data-fancybox="gallery">
            <div class="fs-1 position-absolute bottom-0 start-0 text-white ms-5 mb-4 fw-bold" style="text-shadow: 1px 1px 2px black;">
                {{__('Galería')}}
            </div>
            <hr class="position-absolute bottom-0 start-0 end-0 w-100 mb-4 text-white opacity-100">
        </div>

        <div class="col-6 col-lg-4 p-1">
            <img src="{{asset('/img/fachada-ingreso-new.webp')}}" alt="Render Tridenta Towers" class="w-100" style="height: 400px; object-fit:cover;" data-fancybox="gallery">
        </div>


        <div class="col-6 col-lg-4 p-1">
            <img src="{{asset('/img/terraza-newer.webp')}}" alt="Render Tridenta Towers" class="w-100" style="height: 400px; object-fit:cover;" data-fancybox="gallery">
        </div>

        <div class="col-12 col-lg-8 p-1 position-relative">
            <img src="{{asset('/img/rooftop-newer.webp')}}" alt="Amenidades de Tridenta Towers" class="w-100" style="height: 400px; object-fit:cover; object-position:top;" data-fancybox="gallery">
            <div class="fs-1 position-absolute bottom-0 end-0 text-white me-3 me-lg-5 mb-4 fw-bold">
                <a href="#gallery-1" class="btn btn-light rounded-0 shadow-5"><i class="fa-regular fa-images"></i> {{__('Galería Completa')}}</a>
            </div>
        </div>

        
        <img src="{{asset('img/phase-1-iso.jpg')}}" alt="Galería Tridenta Towers" class="d-none" data-fancybox="gallery">   
        <img src="{{asset('img/payplans-bg.jpg')}}" alt="Galería Tridenta Towers" class="d-none" data-fancybox="gallery">

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
                <i class="fa-solid fa-3x fa-fire"></i>
                <div class="fs-6 fw-light">{{__('Asadores')}}</div>
            </div> --}}
            
            <div class="col me-4 mb-3">
                <i class="fa-solid fa-3x fa-car"></i>
                <div class="fs-6 fw-light">{{__('Estacionamiento')}}</div>
            </div>

            <div class="col me-4 mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" width="55px" fill="#081D3F"><path d="M744-80 511-312l-28 28q-23 23-52.5 35T370-237q-31 0-61-12t-53-35L87-454q-23-23-35-52.5T40-567q0-31 12-60.5T87-680l113-113q23-23 52.5-35t60.5-12q31 0 60.5 12t52.5 35l170 169q23 23 35 53t12 61q0 31-12 60.5T596-397l-28 28 232 233-56 56ZM370-317q15 0 29.5-5.5T426-340l114-114q12-11 17.5-26t5.5-30q0-15-5.5-30T540-567L370-736q-11-12-26-18t-30-6q-15 0-30 6t-27 18L144-623q-12 12-17.5 26.5T121-567q0 15 5.5 30t17.5 27l170 170q11 12 26 17.5t30 5.5ZM207-516q13 0 21.5-8.5T237-546q0-13-8.5-21.5T207-576q-13 0-21.5 8.5T177-546q0 13 8.5 21.5T207-516Zm64-63q13 0 21.5-8.5T301-609q0-13-8.5-21.5T271-639q-13 0-21.5 8.5T241-609q0 13 8.5 21.5T271-579Zm7 134q13 0 21.5-8.5T308-475q0-13-8.5-21.5T278-505q-13 0-21.5 8.5T248-475q0 13 8.5 21.5T278-445Zm56-198q13 0 21.5-8.5T364-673q0-13-8.5-21.5T334-703q-13 0-21.5 8.5T304-673q0 13 8.5 21.5T334-643Zm8 135q13 0 21.5-8.5T372-538q0-13-8.5-21.5T342-568q-13 0-21.5 8.5T312-538q0 13 8.5 21.5T342-508Zm6 134q13 0 21.5-8.5T378-404q0-13-8.5-21.5T348-434q-13 0-21.5 8.5T318-404q0 13 8.5 21.5T348-374Zm57-198q13 0 21.5-8.5T435-602q0-13-8.5-21.5T405-632q-13 0-21.5 8.5T375-602q0 13 8.5 21.5T405-572Zm7 134q13 0 21.5-8.5T442-468q0-13-8.5-21.5T412-498q-13 0-21.5 8.5T382-468q0 13 8.5 21.5T412-438Zm64-64q13 0 21.5-8.5T506-532q0-13-8.5-21.5T476-562q-13 0-21.5 8.5T446-532q0 13 8.5 21.5T476-502Zm304-98q-58 0-99-41t-41-99q0-58 41-99t99-41q58 0 99 41t41 99q0 58-41 99t-99 41Zm0-80q25 0 42.5-17.5T840-740q0-25-17.5-42.5T780-800q-25 0-42.5 17.5T720-740q0 25 17.5 42.5T780-680ZM342-538Zm438-202Z"/></svg>
                <div class="fs-6 fw-light">{{__('Canchas de Padel')}}</div>
            </div> 

            {{-- <div class="col me-4 mb-3">
                <i class="fa-solid fa-3x fa-children"></i>
                <div class="fs-6 fw-light">{{__('Área para niños')}}</div>
            </div> --}}

            <div class="col me-4 mb-3">
                <i class="fa-solid fa-3x fa-dumbbell"></i>
                <div class="fs-6 fw-light">{{__('Gimnasio')}}</div>
            </div>

            <div class="col me-4 mb-3">
                <i class="fa-solid fa-3x fa-building"></i>
                <div class="fs-6 fw-light">{{__('Rooftop')}}</div>
            </div>
            
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

            @if ( !$blueprints->isEmpty() )
                
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

            @endif

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
                    <img src="{{asset('/img/phase-1-master-plan.jpg')}}" alt="Master Plan de Tridenta Towers" class="w-100" data-fancybox="master-plan" loading="lazy">
                </div>

                <div class="carousel-item">
                    <img src="{{asset('img/tridenta-pb.jpg')}}" alt="Planos de Tridenta Towers" class="w-100" data-fancybox="master-plan" loading="lazy">
                </div>

                <div class="carousel-item">
                    <img src="{{asset('img/tridenta-n1.jpg')}}" alt="Planos de Tridenta Towers" class="w-100" data-fancybox="master-plan" loading="lazy">
                </div>

                {{-- <div class="carousel-item">
                    <img src="{{asset('/img/floor-plans.jpg')}}" alt="Planos de Tridenta Towers" class="w-100" data-fancybox="master-plan" loading="lazy">
                </div> --}}

                <div class="carousel-item">
                    <img src="{{asset('/img/floor-render.jpg')}}" alt="Isométrico Tridenta Towers" class="w-100" data-fancybox="master-plan" loading="lazy">
                </div>

                
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselMasterPlan" data-bs-slide="prev"  style="width: 5%;">
                <i class="fa-solid fa-circle-chevron-left text-dark fa-2x"></i>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselMasterPlan" data-bs-slide="next" style="width: 5%;">
                <i class="fa-solid fa-circle-chevron-right text-dark fa-2x"></i>
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

    {{-- Planes de pago --}}
    <section class="position-relative mb-6">

        <img src="{{asset('/img/rooftop-newer.webp')}}" alt="Tridenta Towers" class="w-100 object-fit-cover" style="min-height:60vh; max-height: 85vh;">

        <div class="row justify-content-center position-absolute top-0 start-0 h-100">
            
            <div class="col-11 col-lg-6 col-xxl-5 align-self-center bg-white p-0 text-center shadow-5">

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

    <div class="mb-6">@livewire('contact-form')</div>


    @script
        <script>
            Fancybox.bind("[data-fancybox]", {
                // Your custom options
            });
        </script>
    @endscript

</div>