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
            <div class="col p-1">
                <img src="{{$unit_type_gallery[0]->getUrl('large')}}" alt="{{__('Unidad')}} {{$unit->name}} - Tridenta Towers" class="w-100 object-fit-cover" style="height: 40vh;" data-fancybox="unit-gallery">
            </div>
            
            <div class="col-12 col-lg-4 p-1 d-none d-lg-block">
                
                <div class="position-relative">
                    <img src="{{ asset('media/'.$unit->view_path) }}" class="w-100 object-fit-cover" data-fancybox="unit-gallery-desktop" style="height: 40vh;" data-caption="{{__('Vista de la Unidad')}} {{$unit->name}}">
    
                    @isset($unit->youtube_link)
                        <div class="row justify-content-center position-absolute z-2 top-0 start-0 h-100">
                            <div class="col-12 text-center align-self-center">
                                <a href="{{$unit->youtube_link}}" data-fancybox="unit-view-desktop" class="link-light text-decoration-none">
                                    <i class="fa-solid fa-4x fa-play"></i>
                                    <div class="mt-2 fw-bold fs-4">{{__('Vista de la Unidad')}}</div>
                                </a>
                            </div>
                        </div>
                    @endisset

                    <div class="fondo-azul"></div>
                    
                </div>
    
            </div>

            @isset($unit->secondary_link)

                @php
                    if (preg_match('/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|v\/))([^&\n?#]+)/', $unit->secondary_link, $matches)) {
                        $videoId = $matches[1];
                        $thumbnailUrl = "https://img.youtube.com/vi/{$videoId}/maxresdefault.jpg";
                    } else {
                        $thumbnailUrl = asset('media/'.$unit->view_path);
                    }
                @endphp

                <div class="col-12 col-lg-3 p-1 d-none d-lg-block">
                    
                    <div class="position-relative">
                        <img src="{{ $thumbnailUrl }}" class="w-100 object-fit-cover" data-fancybox="unit-gallery-mobile" style="height: 40vh;" data-caption="{{__('Vista secundaria de la Unidad')}} {{$unit->name}}">
        
                            <div class="row justify-content-center position-absolute z-2 top-0 start-0 h-100">
                                <div class="col-12 text-center align-self-center">
                                    <a href="{{$unit->secondary_link}}" data-fancybox="unit-view-desktop" class="link-light text-decoration-none">
                                        <i class="fa-solid fa-4x fa-play"></i>
                                        <div class="mt-2 fw-bold fs-4">{{__('Vista secundaria de la Unidad')}}</div>
                                    </a>
                                </div>
                            </div>

                        <div class="fondo-azul"></div>
                        
                    </div>
        
                </div>
            @endisset

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
                        </span> 
                        @if ($unit->unitType->flexrooms > 0)
                            {{__(' + D')}}
                        @endif
                    @endif
                </div>

                <div class="mx-3">
                    <i class="fa-solid fa-bath"></i> {{$unit->unitType->bathrooms}} <span class="d-none d-lg-inline fw-light">{{__('Baños')}}</span>
                </div>

                <div>
                    <i class="fa-solid fa-arrow-turn-up"></i> 
                    @if ($unit->floor == 0)
                        {{__('Planta Baja')}}
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

        <div class="col-11 col-lg-3 align-self-center text-center position-relative">

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
                <h3 class="fs-1">${{ number_format($unit->price, 2) }} {{$unit->currency}}</h3> 
            @endif

            <a href="#contact" class="btn btn-blue d-block">
                {{ __('Contactar a un asesor') }}
            </a>
        </div>

    </div>

    {{-- Vista de la unidad solo en móvil --}}
    @isset($unit->view_path)
        <div class="row justify-content-evenly mb-6 d-flex">
            <div class="col-12 col-lg-8 col-xxl-6">

                <h3 class="fs-2 text-center">{{__('Vista principal')}}</h3>

                <div class="position-relative ">
                    <img src="{{ asset('media/'.$unit->view_path) }}" class="w-100 object-fit-cover" data-fancybox="unit-gallery-mobile" style="height: 40vh;" data-caption="{{__('Vista principal')}} {{__('Unidad')}} {{$unit->name}}">

                    @if ($unit->youtube_link)
                        <div class="row justify-content-center position-absolute z-2 top-0 start-0 h-100">
                            <div class="col-12 text-center align-self-center">
                                <a href="{{$unit->youtube_link}}" data-fancybox="unit-view-mobile" class="link-light text-decoration-none">
                                    <i class="fa-solid fa-4x fa-play"></i>
                                    <div class="mt-2 fw-bold fs-4">{{__('Ver video')}}</div>
                                </a>
                            </div>
                        </div>

                        <div class="fondo-azul"></div>
                    @endif


                </div>

            </div>
        </div>
    @endisset

    {{-- Vista de la unidad solo en móvil --}}
    @isset($unit->secondary_link)
        <div class="row justify-content-evenly mb-6 d-flex d-lg-none">
            <div class="col-12 col-lg-11">

                <h3 class="fs-2 text-center">{{__('Vista secundaria')}}</h3>                

                @php
                    if (preg_match('/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|v\/))([^&\n?#]+)/', $unit->secondary_link, $matches)) {
                        $videoId = $matches[1];
                        $thumbnailUrl = "https://img.youtube.com/vi/{$videoId}/maxresdefault.jpg";
                    } else {
                        $thumbnailUrl = asset('media/'.$unit->view_path);
                    }
                @endphp

                <div class="position-relative ">
                    <img src="{{ $thumbnailUrl }}" class="w-100 object-fit-cover" data-fancybox="unit-gallery-mobile" style="height: 40vh;" data-caption="{{__('Vista secundaria de la Unidad')}} {{$unit->name}}">

                    <div class="row justify-content-center position-absolute z-2 top-0 start-0 h-100">
                        <div class="col-12 text-center align-self-center">
                            <a href="{{$unit->secondary_link}}" data-fancybox="unit-secondary-view" class="link-light text-decoration-none">
                                <i class="fa-solid fa-4x fa-play"></i>
                                <div class="mt-2 fw-bold fs-4">{{__('Ver video')}}</div>
                            </a>
                        </div>
                    </div>

                    <div class="fondo-azul"></div>

                </div>

            </div>
        </div>
    @endisset


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
            <div class="col-12 col-lg-11 col-xxl-9 px-2 px-lg-0 order-2 order-lg-1">
                
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

                                    $total_discount = $unit->price - $special_price;
                                }elseif($plan->discount > 0){
                                    $final_price = $unit->price * ( (100 - $plan->discount)/100 );
                                    $special_price = $final_price;
                                    $total_discount = $unit->price - $final_price;
                                }
                                else{
                                    $final_price = $unit->price;
                                    $special_price = $unit->price;
                                    $total_discount = null;
                                }
                            @endphp 
        
                            <div class="tab-pane pb-3 fade @if($i==0) show active @endif" id="pills-plan-{{$plan->id}}" role="tabpanel" tabindex="0">      

                                @if ($plan->discount > 0 and $plan->additional_discount > 0)
                                    <div class="py-4 bg-blue text-center">
                                        <div>{{__('Precio especial con 5% de descuento adicional')}}</div>
                                        <div class="fs-2">${{ number_format($special_price,2) }} {{ $unit->currency }}</div>
                                    </div>
                                @else
                                    <div class="py-4 bg-blue text-center">
                                        <div>{{__('Precio Final')}}</div>
                                        <div class="fs-2">${{ number_format($final_price,2) }} {{ $unit->currency }}</div>
                                    </div>
                                @endif
                                
        
                                @if($plan->discount > 0 and $plan->additional_discount > 0)

                                    <div class="row justify-content-between my-3 px-2 px-lg-4">
                                        <div class="fs-4">{{__('Precio de lista')}}</div>
                                        <div class="text-decoration-line-through fs-4">${{ number_format($unit->price,2) }} {{ $unit->currency }}</div>
                                    </div>
                                
                                    <div class="row justify-content-between mb-3 px-2 px-lg-4">
                                        <div class="fs-4">{{__('Descuento')}} ({{$plan->discount}}%)</div>
                                        <div class="fs-4 text-decoration-line-through">${{ number_format( $total_discount,2 ) }} {{ $unit->currency }}</div>
                                    </div>

                                    <div class="row justify-content-between mb-3 px-2 px-lg-4">
                                        <div class="fs-4">
                                            {{__('Precio Final')}}
                                            <div class="fs-7 fw-light">{{__('Precio final con 5% de descuento adicional')}}.</div>
                                        </div>
                                        <div class="fs-4">${{ number_format( $special_price,1 ) }} {{ $unit->currency }}</div>
                                    </div>

                                @elseif($plan->discount > 0)

                                    <div class="row justify-content-between my-3 px-2 px-lg-4">
                                        <div class="fs-plans col-6 px-2">{{__('Precio de lista')}}</div>
                                        <div class="text-decoration-line-through fs-plans col-6 text-end">${{ number_format($unit->price,1) }} {{ $unit->currency }}</div>
                                    </div>
                                
                                    <div class="row justify-content-between mb-3 px-2 px-lg-4">
                                        <div class="fs-plans col-6 px-2">
                                            {{__('Descuento')}} ({{$plan->discount}}%)
                                            {{-- <div class="fs-7 fw-light">{{__('Precio final con descuento')}}.</div> --}}
                                        </div>
                                        <div class="fs-plans col-6 text-end">${{ number_format( $total_discount,1 ) }} {{ $unit->currency }}</div>
                                    </div>

                                @else
                                    <div class="row justify-content-between my-3 px-2 px-lg-4">
                                        <div class="fs-plans col-6 px-2">{{__('Precio de lista')}}</div>
                                        <div class="fs-plans col-6 text-end">${{ number_format($unit->price,1) }} {{ $unit->currency }}</div>
                                    </div>
                                @endif

                                <hr>
        
                                @isset($plan->down_payment)
                                    <div class="row justify-content-between mb-3 px-2 px-lg-4">
                                        <div class="fs-plans col-6 px-2">
                                            {{__('Enganche')}} ({{$plan->down_payment}}%)
                                        </div>
                                        <div class="fs-plans col-6 text-end">${{ number_format( $special_price * ($plan->down_payment/100),1 ) }} {{ $unit->currency }}</div>
                                        <div class="fs-7 col-12 fw-light">{{__('A la firma del contrato de promesa de compra-venta')}}.</div>
                                    </div>
                                @endisset

                                @isset($plan->starting_const)
                                    <div class="row justify-content-between mb-3 px-2 px-lg-4">
                                        <div class="fs-plans col-7 px-2">
                                            {{__('Al inicio de obra')}} ({{$plan->starting_const}}%)
                                        </div>
                                        <div class="fs-plans col-5 text-end">${{ number_format( $special_price * ($plan->starting_const/100),1 ) }} {{ $unit->currency }}</div>
                                        <div class="fs-7 fw-light col-12">{{__('Pago al momento que inicia la construcción')}}.</div>
                                    </div>
                                    
                                @endisset
        
                                @isset($plan->second_payment)
                                    <div class="row justify-content-between mb-3 px-2 px-lg-4">
                                        <div class="fs-plans col-7 px-2">
                                            {{__('Segundo pago')}} ({{$plan->second_payment}}%)
                                        </div>
                                        <div class="fs-plans col-5 text-end">${{ number_format( $special_price * ($plan->second_payment/100),1 ) }} {{ $unit->currency }}</div>
                                        <div class="col-12 fs-7 fw-light">
                                            @if ($plan->second_payment_const)
                                                {{ __('A los :months meses después del incio de la obra.', ['months'=>$plan->second_payment_months] ) }}
                                            @else
                                                {{ __('A los :months meses después de la firma de contrato.', ['months'=>$plan->second_payment_months] ) }}
                                            @endif
                                        </div>
                                    </div>
                                @endisset

                                @isset($plan->third_payment)
                                    <div class="row justify-content-between mb-3 px-2 px-lg-4">
                                        <div class="fs-plans col-7 px-2">
                                            {{__('Tercer pago')}} ({{$plan->third_payment}}%)
                                        </div>
                                        <div class="fs-plans col-5 text-end">${{ number_format( $special_price * ($plan->third_payment/100),1 ) }} {{ $unit->currency }}</div>
                                        <div class="col-12 fs-7 fw-light">
                                            @if ($plan->third_payment_const)
                                                {{ __('A los :months meses después del incio de la obra.', ['months'=>$plan->third_payment_months] ) }}
                                            @else
                                                {{ __('A los :months meses después de la firma de contrato.', ['months'=>$plan->third_payment_months] ) }}
                                            @endif
                                        </div>
                                    </div>
                                @endisset
                                
                                @isset($plan->months_percent)
                                    <div class="row justify-content-between mb-3 px-2 px-lg-4">

                                        <div class="fs-plans col-7 px-2">
                                            {{$plan->monthly_payments}} {{__('Mensualidades')}} ({{$plan->months_percent}}%)
                                        </div>

                                        <div class="fs-plans col-5 text-end">${{ number_format( $special_price * ($plan->months_percent/100),1 ) }} {{ $unit->currency }}</div>

                                        @if ($plan->months_during_const)
                                            <div class="fs-7 fw-light col-12">{{__('Pagos mensuales durante la construcción')}}</div>
                                        @endif
                                    </div>
                                @endisset

                                @isset($plan->monthly_payments)
                                    <div class="row justify-content-between mb-3 px-2 px-lg-4">
                                        <div class="fs-plans col-6 px-2">
                                            {{__('Cada mensualidad')}} 
                                        </div>
                                        <div class="fs-plans col-6 text-end">${{ number_format( ($special_price * ($plan->months_percent/100))/$plan->monthly_payments,1 ) }} {{ $unit->currency }}</div>
                                    </div>
                                @endisset
        
                                @isset($plan->closing_payment)
                                    <div class="row justify-content-between px-2 px-lg-4">
                                        <div class="fs-plans col-6 px-2">
                                            {{__('Pago Final')}} ({{$plan->closing_payment}}%)
                                        </div>
                                        <div class="fs-plans col-6 text-end">${{ number_format( $special_price * ($plan->closing_payment/100),1 ) }} {{ $unit->currency }}</div>
                                        <div class="fs-7 fw-light col-12">{{__('A la entrega física de la propiedad')}}.</div>
                                    </div>
                                @endisset
        
                            </div>
        
                            @php $i++; @endphp
                        @endforeach
                    </div>
                </div>
                
                <div class="bg-green mt-2">
                    <ul class="fs-7 fw-light">
                        <li class="mb-1">
                            {{__('El contrato de promesa de compra-venta tendrá que firmarse en un plazo máximo de diez días a partir de la firma de la solicitud de compra.')}}
                        </li>
        
                        <li class="mb-1">
                            {{__('En caso de no proceder con la compra de la unidad en el tiempo establecido (firma de contrato y pago de enganche), la unidad quedará disponible.')}}
                        </li>
        
                        <li class="mb-1">{{__('Precios, descuentos y condiciones de pago sujetos a cambios sin previo aviso.')}}</li>
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
                Hash: false,
            });
        </script>
    @endscript

</div>
