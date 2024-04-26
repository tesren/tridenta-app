@extends('layouts.admin-base')

@section('titles')
    <title>{{__('Unidad')}} {{$unit->name}} - Tridenta Towers</title>
@endsection

@section('content')

    @php
        $unit_gallery = $unit->getMedia('unitgallery');
        $unit_type_gallery = $unit->unitType->getMedia('gallery');
    @endphp

    {{-- Imagenes --}}
    <div class="row mb-5">

        <div class="col-12 col-lg-8 p-1">
            <img src="{{$unit_type_gallery[0]->getUrl('large')}}" alt="Galería unidad {{$unit->name}} - Tridenta Towers" class="w-100 unit-imgs" data-fancybox="gallery">
        </div>

        
        <div class="col-12 col-lg-4 p-1">

            {{-- @if( isset($unit_type_gallery[1]) )
                <img src="{{$unit_type_gallery[1]->getUrl('large')}}" alt="Galería unidad {{$unit->name}} - Tridenta Towers" class="w-100 mb-2" style="height: 32vh; object-fit: cover;"  data-fancybox="gallery">
            @endif --}}

            {{-- Vista y video de vista --}}
            @if ( isset($unit->view_path ) )
                <div class="position-relative">
                    <img src="{{ asset('media/'.$unit->view_path) }}" class="w-100 unit-imgs" data-fancybox="gallery">

                    @isset($unit->youtube_link)
                        <div class="row justify-content-center position-absolute top-0 start-0 h-100">
                            <div class="col-12 text-center align-self-center">
                                <a href="{{$unit->youtube_link}}" data-fancybox="unit-view" class="link-light text-decoration-none"><i class="fa-solid fa-3x fa-play"></i></a>
                            </div>
                        </div>
                    @endisset
                </div>
            @endif

        </div>
        
    </div>

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
    <div class="row justify-content-evenly mb-6">

        <div class="col-12 col-lg-7">
            <h1 class="mb-1">
                {{__('Unidad')}} {{$unit->name}}

                <span class="d-inline d-lg-none">
                    {{-- Revisar si esta unidad ya está guardada --}}
                    @if ( !null == $unit->users()->wherePivot('unit_id', $unit->id)->wherePivot('user_id', auth()->user()->id)->first() )
                        
                        <form class="d-inline" action="{{ route('user.delete.unit', ['id' => $unit->id ]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            
                            <input type="hidden" value="{{ $unit->id }}" name="unit_id">
                            <button class="btn fs-3" type="submit" title="{{__('Quitar de favoritos')}}" onclick="this.disabled=true;this.form.submit();"><i class="fa-solid text-danger fa-heart"></i></button>
                        </form>
                    @else
                        <form class="d-inline" action="{{ route('user.store.unit') }}" method="post">
                            @csrf
                            <input type="hidden" value="{{ $unit->id }}" name="unit_id">
                            <button class="btn fs-3" type="submit" title="{{__('Agregar a favoritos')}}" onclick="this.disabled=true;this.form.submit();" ><i class="fa-regular text-danger fa-heart"></i></button>
                        </form>
                    @endif
                </span>
            </h1>

            <div class="fs-4 fw-light text-secondary mb-4">{{__('Tipo')}} {{$unit->unitType->name}}</div>

            <h2 class="fs-3">{{__('Características')}}</h2>

            <div class="d-flex mb-4 fs-5">

                <div>
                    <i class="fa-solid fa-bed"></i> {{$unit->unitType->bedrooms}} <span class="d-none d-lg-inline fw-light">{{__('Recámaras')}}</span>
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
            <div class="d-flex fs-5 fw-light">
                <div>
                    <i class="fa-solid fa-expand"></i> {{__('Interior')}}: {{$unit->unitType->interior_const}} {{__('m²')}}
                </div>

                <div class="mx-3">
                    <i class="fa-solid fa-maximize"></i> {{__('Exterior')}}: {{$unit->unitType->exterior_const}} {{__('m²')}}
                </div>

                <div>
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


            <div class="position-absolute top-0 end-0 d-none d-lg-block">
                {{-- Revisar si esta unidad ya está guardada --}}
                @if ( !null == $unit->users()->wherePivot('unit_id', $unit->id)->wherePivot('user_id', auth()->user()->id)->first() )
                    
                    <form action="{{ route('user.delete.unit', ['id' => $unit->id ]) }}" method="post">
                        @method('DELETE')
                        @csrf
                        
                        <input type="hidden" value="{{ $unit->id }}" name="unit_id">
                        <button class="btn fs-3" type="submit" title="{{__('Quitar de favoritos')}}" onclick="this.disabled=true;this.form.submit();"><i class="fa-solid text-danger fa-heart"></i></button>
                    </form>
                @else
                    <form action="{{ route('user.store.unit') }}" method="post">
                        @csrf
                        <input type="hidden" value="{{ $unit->id }}" name="unit_id">
                        <button class="btn fs-3" type="submit" title="{{__('Agregar a favoritos')}}" onclick="this.disabled=true;this.form.submit();" ><i class="fa-regular text-danger fa-heart"></i></button>
                    </form>
                @endif
            </div>

            @if ($unit->price != 0)
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

            <img src="{{ $blueprints[1]->getUrl('large') }}" alt="Planos de la unidad {{$unit->name}} de Tridenta Towers" class="w-100" data-fancybox="blueprints">
            <div class="fs-7 text-secondary text-center">{{__('Las imagenes son con fines ilustrativos. Precios y dimensiones pueden cambiar sin previo aviso.')}}</div>
        </div>
    </div>

    {{-- Planes de pago --}}
    @if( $unit->status != 'Vendida' and $unit->price != 0)
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
                            if($plan->discount > 0){
                                $final_price = $unit->price * ( (100 - $plan->discount)/100 );
                                
                                //descuento especial de preventa
                                $special_price = $final_price * 0.95;
                            }else{
                                $final_price = $unit->price;
                                //descuento especial de preventa
                                $special_price = $final_price * 0.95;
                            }
                        @endphp 
    
                        <div class="tab-pane pb-3 fade @if($i==0) show active @endif" id="pills-plan-{{$plan->id}}" role="tabpanel" tabindex="0">
                            
                            <div class="py-4 bg-blue text-center">
                                <div>{{__('Precio con Descuento')}}</div>
                                <div class="fs-3 text-decoration-line-through mb-3">${{ number_format($final_price) }} {{ $unit->currency }}</div>

                                <div>{{__('Precio especial de Preventa Privada')}}</div>
                                <div class="fs-2">${{ number_format($special_price) }} {{ $unit->currency }}</div>
                            </div>
    
                            @isset($plan->discount)
                                <div class="d-flex justify-content-between my-3 px-2 px-lg-4 fw-light">
                                    <div class="fs-4">{{__('Precio de lista')}}</div>
                                    <div class="text-decoration-line-through fs-4">${{ number_format($unit->price) }} {{ $unit->currency }}</div>
                                </div>
                            @endisset
    
                            @isset($plan->discount)
                                <div class="d-flex justify-content-between mb-3 px-2 px-lg-4 fw-light">
                                    <div class="fs-4">{{__('Descuento')}} ({{$plan->discount}}%)</div>
                                    <div class="fs-4">${{ number_format( $unit->price * ($plan->discount/100) ) }} {{ $unit->currency }}</div>
                                </div>
    
                                <hr class="green-hr">
                            @endisset
    
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
                                        {{$plan->months_amount}} {{__('Mensualidades')}} ({{$plan->months_percent}}%)
                                        @if ($plan->during_const)
                                            <div class="fs-7 fw-light d-none d-lg-block">{{$plan->months_amount}} {{__('Pagos mensuales durante la construcción')}}.</div>
                                        @endif
                                    </div>
                                    <div class="fs-4">${{ number_format( $special_price * ($plan->months_percent/100) ) }} {{ $unit->currency }}</div>
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

    {{-- @include('components.contact-form') --}}

@endsection