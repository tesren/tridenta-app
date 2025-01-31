<div>
    {{-- Stop trying to control. --}}
    @section('titles')
        <title>{{__('Condominio')}} {{$unit->name}} {{__('en venta frente al mar')}} - Tridenta Towers</title>
        <meta name="description" content="{{__('Condominio')}} {{$unit->name}} {{__('un condominio excepcional en venta dentro de nuestro exclusivo desarrollo frente al mar en Puerto Vallarta. ofrece una experiencia de vida incomparable. Descubre más sobre este condominio único y agenda una visita para experimentar en persona la elegancia y el confort que te espera en Tridenta Towers.')}}">
    @endsection

    @php
        $unit_gallery = $unit->getMedia('unitgallery');
        $unit_type_gallery = $unit->unitType->getMedia('gallery');
    @endphp

    {{-- Imagenes --}}

    @if( count($unit_type_gallery) > 0 and isset($unit->view_path ) )
        <div class="row">
            <div class="col-12 col-lg-8 p-1">
                <img src="{{$unit_type_gallery[0]->getUrl('large')}}" alt="{{__('Unidad')}} {{$unit->name}} - Tridenta Towers" class="w-100 object-fit-cover" style="height: 40vh;" data-fancybox="unit-gallery">
            </div>
            
            <div class="col-12 col-lg-4 p-1 d-none d-lg-block">
                
                <div class="position-relative">
                    <img src="{{ asset('media/'.$unit->view_path) }}" class="w-100" data-fancybox="unit-gallery" style="height: 40vh;" data-caption="{{__('Vista de la Unidad')}} {{$unit->name}}">
    
                    @isset($unit->youtube_link)
                        <div class="row justify-content-center position-absolute top-0 start-0 h-100">
                            <div class="col-12 text-center align-self-center">
                                <a href="{{$unit->youtube_link}}" data-fancybox="unit-view" class="link-light text-decoration-none">
                                    <i class="fa-solid fa-3x fa-play"></i>
                                    <div class="mt-2 fw-bold">{{__('Vista de la Unidad')}}</div>
                                </a>
                            </div>
                        </div>
                    @endisset
                    
                </div>
    
            </div>
        </div>
    @elseif ( count($unit_type_gallery) > 0)
 
        <img src="{{$unit_type_gallery[0]->getUrl('large')}}" alt="{{__('Unidad')}} {{$unit->name}} - Tridenta Towers" class="w-100 object-fit-cover" style="height: 40vh;" data-fancybox="unit-gallery">
    
    @else

        <div class="row justify-content-center py-5 mb-5" style="background-image: url('{{asset('img/auth-bg.jpg')}}');">
            <div class="col-7 col-lg-4 col-xxl-3">
                <img src="{{asset('img/tridenta-full-logo.webp')}}" alt="{{__('Unidad')}} {{$unit->name}} - Tridenta Towers" class="w-100">
            </div>
        </div>

    @endif
    

    {{-- Galería de tipos de unidad --}}
    @if( count($unit_type_gallery) > 1 )

        @for ($i=1; $i<count($unit_type_gallery); $i++ )
            <img src="{{$unit_type_gallery[$i]->getUrl('large')}}" alt="Galería unidad {{$unit->name}} - Tridenta Towers" class="d-none" data-fancybox="gallery">
        @endfor

    @endif


    {{-- Galeria de la unidad --}}
    @if( count($unit_gallery) > 0 )
        
        @foreach ($unit_gallery as $img)
            <img src="{{ $img->getUrl('large') }}" alt="Galería unidad {{$unit->name}} - Tridenta Towers" class="d-none" data-fancybox="gallery">
        @endforeach

    @endisset

    {{-- Información --}}
    <div class="row justify-content-evenly mb-6 mt-4 mt-lg-5">

        <div class="col-12 col-lg-7">
            <h1 class="mb-1">
                {{__('Unidad')}} {{$unit->name}}
            </h1>

            <div class="fs-4 fw-light text-secondary mb-4">{{__('Tipo')}} {{$unit->unitType->name}}</div>

            <h2 class="fs-3">{{__('Características')}}</h2>

            <div class="d-flex mb-4 fs-5">

                <div>
                    <i class="fa-solid fa-bed"></i> 
                    @if ($unit->unitType->bedrooms == 0)
                        <span class="fw-light">{{__('Estudio')}}</span>
                    @else
                        {{$unit->unitType->bedrooms}} 
                        <span class="d-none d-lg-inline fw-light">
                            {{__('Recámaras')}}
                            @if ($unit->unitType->flexrooms > 0)
                                {{__(' + Flex')}}
                            @endif
                        </span> 
                    @endif
                </div>

                <div class="mx-3">
                    <i class="fa-solid fa-bath"></i> {{$unit->unitType->bathrooms}} <span class="d-none d-lg-inline fw-light">{{__('Baños')}}</span>
                </div>

                <div>
                    <i class="fa-solid fa-arrow-turn-up"></i> 
                    @if ($unit->section_id == 1)
                        @if ($unit->floor == 1)
                            {{__('Planta Baja')}}
                        @else
                            {{__('Planta Alta')}}
                        @endif
                    @else
                        <span class="d-none d-lg-inline fw-light">{{__('Nivel')}}</span> {{$unit->floor}}
                    @endif
                </div>

            </div>

            <h2 class="fs-3">{{__('Dimensiones')}}</h2>
            <div class="row fs-5 fw-light">
                <div class="col-12 col-lg-3 mb-2">
                    <i class="fa-solid fa-expand"></i> {{__('Interior')}}: {{$unit->unitType->interior_const}} {{__('m²')}}
                </div>

                <div class="col-12 col-lg-3 mb-2">
                    <i class="fa-solid fa-maximize"></i> {{__('Terraza')}}: {{$unit->unitType->exterior_const}} {{__('m²')}}
                </div>

                @if ($unit->unitType->extra_exterior_const)
                    <div class="col-12 col-lg-3 mb-2">
                        <i class="fa-solid fa-ruler-combined"></i> {{__('Descubierto')}}: {{$unit->unitType->extra_exterior_const}} {{__('m²')}}
                    </div>
                @endif

                <div class="col-12 col-lg-3">
                    <i class="fa-solid fa-house-chimney"></i> {{__('Total')}}: {{$unit->unitType->const_total}} {{__('m²')}}
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-3 align-self-center text-center position-relative">

            @php
                if($unit->status == 'Disponible'){
                    $badgeBg = 'bg-success';
                }elseif($unit->status == 'Apartada'){
                    $badgeBg = 'bg-warning';
                }
                else{
                    $badgeBg = 'bg-danger';
                }
            @endphp

            <div class="badge {{$badgeBg}} rounded-pill mb-2 fs-5 fw-light mt-5 mt-lg-3">
                {{__($unit->status)}}
            </div>


            @if ($unit->price != 0 and $unit->status == 'Disponible')
                <h3 class="fs-1">${{ number_format($unit->price) }} {{$unit->currency}}</h3> 
            @endif

            <a href="#contact" class="btn btn-blue d-block">
                {{ __('Contactar a un asesor') }}
            </a>
        </div>

    </div>

    {{-- Planos --}}
    <div class="row justify-content-evenly mb-6">
        <div class="col-12 col-lg-11">

            <h3 class="fs-2 text-center">{{__('Planos de la unidad')}}</h3>
            @php
                $blueprints = $unit->unitType->getMedia('blueprints')
            @endphp

            <div class="row justify-content-evenly">
                @foreach ($blueprints as $blueprint)
                    <div class="col-12 col-lg-5 mb-3">
                        <img src="{{ $blueprint->getUrl('large') }}" alt="Planos de la unidad {{$unit->name}} de Tridenta Towers" class="w-100" data-fancybox="blueprints">
                    </div>
                @endforeach
            </div>

            <div class="fs-7 text-secondary text-center">{{__('Las imagenes son con fines ilustrativos. Precios y dimensiones pueden cambiar sin previo aviso.')}}</div>
        </div>
    </div>

    {{-- Planes de pago --}}
    @if( $unit->status == 'Disponible' and $unit->price != 0)
        <div class="row justify-content-evenly mb-6">
            <div class="col-12 col-lg-11 px-2 px-lg-0 order-2 order-lg-1">
                
                <div class="rounded-2 px-0 shadow-5">
        
                    <h3 class="fs-4 mb-3 text-center d-block d-lg-none pt-4">{{__('Planes de Pago')}}</h3>
        
                    <ul class="position-relative nav nav-pills px-3 px-lg-5 pb-4 pt-0 pt-lg-4 justify-content-center justify-content-lg-start z-3" id="pills-tab" role="tablist">
        
                        <li class="me-3 d-none d-lg-flex">
                            <h3 class="fs-4 mb-0 align-self-center">{{__('Planes de Pago')}}</h3>
                        </li>
        
                        @php
                            $i = 0;
                        @endphp
        
                        @foreach ($unit->paymentPlans as $plan)
        
                            <li class="nav-item me-1" role="presentation">
                                <button class="nav-link plan-nav rounded-pill @if($i==0) active @endif" id="pills-{{$plan->id}}-tab" data-bs-toggle="pill" data-bs-target="#pills-plan-{{$plan->id}}" type="button" role="tab">
                                    @if (app()->getLocale() == 'en')
                                        {{$plan->name_en}}
                                    @else
                                        {{$plan->name}}
                                    @endif
                                </button>
                            </li>
        
                            @php
                                $i++;
                            @endphp
                        @endforeach
                        
                    </ul>
        
                    <div class="tab-content position-relative" id="pills-tabContent">
            
                        @php $i = 0; @endphp
                        @foreach ($unit->paymentPlans as $plan)
        
                            @php
                                if($plan->discount > 0 and $plan->additional_discount > 0){
                                    $final_price = $unit->price * ( (100 - $plan->discount)/100 );
                                    
                                    //descuento especial de preventa
                                    $special_price = $final_price * ( (100 - $plan->additional_discount)/100 );

                                }elseif($plan->discount > 0){
                                    $final_price = $unit->price * ( (100 - $plan->discount)/100 );
                                    $special_price = $final_price;
                                }
                                else{
                                    $final_price = $unit->price;
                                    $special_price = $unit->price;
                                }
                            @endphp 
        
                            <div class="tab-pane pb-3 fade @if($i==0) show active @endif" id="pills-plan-{{$plan->id}}" role="tabpanel" tabindex="0">      

                                @if ($plan->discount > 0 and $plan->additional_discount > 0)
                                    <div class="py-4 bg-blue text-center">
                                        <div>{{__('Precio especial de Preventa Privada con 5% de descuento adicional')}}</div>
                                        <div class="fs-2">${{ number_format($special_price) }} {{ $unit->currency }}</div>
                                    </div>
                                @else
                                    <div class="py-4 bg-blue text-center">
                                        <div>{{__('Precio Final')}}</div>
                                        <div class="fs-2">${{ number_format($final_price) }} {{ $unit->currency }}</div>
                                    </div>
                                @endif
                                
        
                                @if($plan->discount > 0 and $plan->additional_discount > 0)

                                    <div class="d-flex justify-content-between my-3 px-2 px-lg-4 fw-light">
                                        <div class="fs-4">{{__('Precio de lista')}}</div>
                                        <div class="text-decoration-line-through fs-4">${{ number_format($unit->price) }} {{ $unit->currency }}</div>
                                    </div>
                                
                                    <div class="d-flex justify-content-between mb-3 px-2 px-lg-4 fw-light">
                                        <div class="fs-4">{{__('Descuento')}} ({{$plan->discount}}%)</div>
                                        <div class="fs-4 text-decoration-line-through">${{ number_format( $final_price ) }} {{ $unit->currency }}</div>
                                    </div>

                                    <div class="d-flex justify-content-between mb-3 px-2 px-lg-4 fw-light">
                                        <div class="fs-4">
                                            {{__('Precio Final')}}
                                            <div class="fs-7 fw-light d-none d-lg-block">{{__('Precio final con 5% de descuento adicional')}}.</div>
                                        </div>
                                        <div class="fs-4">${{ number_format( $special_price ) }} {{ $unit->currency }}</div>
                                    </div>

                                @elseif($plan->discount > 0)

                                    <div class="d-flex justify-content-between my-3 px-2 px-lg-4 fw-light">
                                        <div class="fs-4">{{__('Precio de lista')}}</div>
                                        <div class="text-decoration-line-through fs-4">${{ number_format($unit->price) }} {{ $unit->currency }}</div>
                                    </div>
                                
                                    <div class="d-flex justify-content-between mb-3 px-2 px-lg-4 fw-light">
                                        <div class="fs-4">
                                            {{__('Descuento')}} ({{$plan->discount}}%)
                                            <div class="fs-7 fw-light d-none d-lg-block">{{__('Precio final con descuento')}}.</div>
                                        </div>
                                        <div class="fs-4">${{ number_format( $final_price ) }} {{ $unit->currency }}</div>
                                    </div>

                                @else
                                    <div class="d-flex justify-content-between my-3 px-2 px-lg-4 fw-light">
                                        <div class="fs-4">{{__('Precio de lista')}}</div>
                                        <div class="fs-4">${{ number_format($unit->price) }} {{ $unit->currency }}</div>
                                    </div>
                                @endif

                                <hr>
        
                                @isset($plan->down_payment)
                                    <div class="d-flex justify-content-between mb-3 px-2 px-lg-4 fw-light">
                                        <div class="fs-4">
                                            {{__('Enganche')}} ({{$plan->down_payment}}%)
                                            <div class="fs-7 fw-light d-none d-lg-block">{{__('A la firma del contrato de promesa de compra-venta')}}.</div>
                                        </div>
                                        <div class="fs-4">${{ number_format( $special_price * ($plan->down_payment/100) ) }} {{ $unit->currency }}</div>
                                    </div>
                                @endisset
        
                                @isset($plan->second_payment)
                                    <div class="d-flex justify-content-between mb-3 px-2 px-lg-4 fw-light">
                                        <div class="fs-4">
                                            {{__('Segundo pago')}} ({{$plan->second_payment}}%)
                                            <div class="fs-7 fw-light d-none d-lg-block">{{__('Sesenta días después del enganche')}}.</div>
                                        </div>
                                        <div class="fs-4">${{ number_format( $special_price * ($plan->second_payment/100) ) }} {{ $unit->currency }}</div>
                                    </div>
                                @endisset
                                
                                @isset($plan->months_percent)
                                    <div class="d-flex justify-content-between mb-3 px-2 px-lg-4 fw-light">
                                        <div class="fs-4">
                                            {{$plan->monthly_payments}} {{__('Mensualidades')}} ({{$plan->months_percent}}%)
                                        </div>
                                        <div class="fs-4">${{ number_format( $special_price * ($plan->months_percent/100) ) }} {{ $unit->currency }}</div>
                                    </div>
                                @endisset

                                @isset($plan->monthly_payments)
                                    <div class="d-flex justify-content-between mb-3 px-2 px-lg-4 fw-light">
                                        <div class="fs-4">
                                            {{__('Cada mensualidad')}} 
                                        </div>
                                        <div class="fs-4">${{ number_format( ($special_price * ($plan->months_percent/100))/$plan->monthly_payments ) }} {{ $unit->currency }}</div>
                                    </div>
                                @endisset
        
                                @isset($plan->closing_payment)
                                    <div class="d-flex justify-content-between px-2 px-lg-4 fw-light">
                                        <div class="fs-4">
                                            {{__('Pago Final')}} ({{$plan->closing_payment}}%)
                                            <div class="fs-7 fw-light d-none d-lg-block">{{__('A la entrega física de la propiedad')}}.</div>
                                        </div>
                                        <div class="fs-4">${{ number_format( $special_price * ($plan->closing_payment/100) ) }} {{ $unit->currency }}</div>
                                    </div>
                                @endisset
        
                            </div>
        
                            @php $i++; @endphp
                        @endforeach
                    </div>
                </div>
                
                <div class="bg-green mt-2">
                    <ul class="fs-7 fw-light">
                        <li>
                            {{__('El contrato de promesa de compra-venta tendrá que firmarse en un plazo máximo de diez días a partir de la firma de la solicitud de compra.')}}
                        </li>
        
                        <li>
                            {{__('En caso de no proceder con la compra de la unidad en el tiempo establecido (firma de contrato y pago de enganche), la unidad quedará disponible.')}}
                        </li>
        
                        <li>{{__('Precios, descuentos y condiciones de pago sujetos a cambios sin previo aviso.')}}</li>
                    </ul>
                </div>
        
            </div>
        </div>
    @endif

    @livewire('contact-form')

    @script
        <script>
            Fancybox.bind("[data-fancybox]", {
                // Your custom options
            });
        </script>
    @endscript

</div>
