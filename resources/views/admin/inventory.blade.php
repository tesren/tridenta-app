@extends('layouts.admin-base')

@section('titles')
    <title>{{__('Inventario - Tridenta Towers')}}</title>
@endsection

@section('content')

    <div class="container my-6">
        <h1>{{__('Condominios en Preventa')}}</h1>
        <p>{{__('Da clic en una sección y selecciona un condominio para ver más información')}}</p>
        <div class="d-flex mb-1">
            <div class="me-3">
                <span class="px-2 py-1 bg-success text-success rounded-2">D</span> {{__('Disponible')}}
            </div>

            <div class="me-3">
                <span class="px-2 py-1 bg-warning text-warning rounded-2">A</span> {{__('Apartada')}}
            </div>

            <div>
                <span class="px-2 py-1 bg-danger text-danger rounded-2">V</span> {{__('Vendida')}}
            </div>
        </div>

        <div class="container input-group justify-content-end mb-3 text-end">
            <a href="{{route('dashboard.inventory')}}" class="btn btn-outline-blue rounded-end-0 rounded-start-circle"><i class="fa-solid fa-border-all"></i></a>
            <a href="{{route('dashboard.search')}}" class="btn btn-outline-blue rounded-start-0 rounded-end-circle"><i class="fa-solid fa-list"></i></a>
        </div>

        {{-- Inventario en escritorio --}}
        <div class="row justify-content-evenly d-none d-lg-flex">

            <div class="col-12 col-lg-5 position-relative p-0 nav nav-tabs" id="myTab" role="tablist">
                <img src="{{asset('img/tridenta-front.jpg')}}" alt="Inventario disponible de Tridenta Towers" class="w-100 rounded-2 shadow-5">

                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" class="position-absolute start-0 top-0 px-0" viewBox="0 0 1446 1920">

                    @foreach ($sections as $section)
        
                        <a href="#tab-pane-{{$section->id}}" class="text-decoration-none link-light" id="tab-{{$section->id}}" data-bs-toggle="tab" data-bs-target="#tab-pane-{{$section->id}}" role="tab">
                            <polygon class="section-class" points="{{$section->points}}"></polygon>
                            
                            <text x="{{$section->text_x ?? 0;}}" y="{{$section->text_y ?? 0; }}"
                                font-size="46" font-weight="bold" fill="#fff" class="fw-light">
        
                                <tspan class="fw-bold">{{__('Torre')}} {{$section->name}}</tspan>
        
                                @php
                                    $type_x = ($section->text_x ?? 0) + 3;
                                @endphp
        
                                @isset($section->subtitle)
                                    <tspan x="{{$type_x}}" dy="1.3em" font-size="36" font-weight="light">
                                        {{__('Nivel')}} {{$section->subtitle}}
                                    </tspan>
                                @endisset
                                
                            </text>
                        </a>    
                        
                    @endforeach
                </svg>

            </div>

            <div class="col-12 col-lg-6">
                <div class="tab-content" id="myTabContent">
                   @php $i=0; @endphp 
                    @foreach ($sections as $section)

                        <div class="tab-pane fade @if($i==0)  @endif" id="tab-pane-{{$section->id}}" role="tabpanel" tabindex="{{$i}}">
                            <div class="position-relative">
                                <img src="{{ asset('media/'.$section->img_path) }}" alt="{{__('Torre')}} {{$section->name}} - {{__('Niveles')}} {{$section->subtitle}}" class="w-100">

                                @php
                                    if($section->id == 5 or $section->id == 6 or $section->id == 7){
                                        $font_size = 22;
                                    }
                                    else{
                                        $font_size = 32;
                                    }
                                @endphp

                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" class="position-absolute start-0 top-0 px-0" viewBox="{{$section->viewbox}}">

                                    @foreach ($section->units as $unit)
                        
                                        <a href="{{route('dashboard.unit', ['id' => $unit->id]) }}" class="text-decoration-none link-light">
                                            <polygon class="{{ strtolower($unit->status) }}-class" points="{{$unit->shape->points ?? '0,0'}}"></polygon>
                                            
                                            <text x="{{$unit->shape->text_x ?? 0;}}" y="{{$unit->shape->text_y ?? 0; }}"
                                                font-size="{{$font_size}}" font-weight="bold" fill="#fff" class="fw-light">
                        
                                                <tspan class="fw-bold">{{$unit->name}}</tspan>
                                                
                                            </text>
                                        </a>    
                                        
                                    @endforeach
                                </svg>

                            </div>
                        </div>

                        @php $i++; @endphp 
                    @endforeach
                </div>
            </div>

        </div>

        {{-- Inventario en movil --}}
      <div class="container-fluid justify-content-center d-block d-lg-none p-0 position-relative" >

        <button data-bs-target="#carouselInventoryMobile" data-bs-slide-to="0" aria-label="Slide 1" id="back-to-building" class="btn btn-blue mb-2 rounded-2 shadow-5">
          <i class="far fa-building"></i> {{__('Ver Torre Completa')}}
        </button>

        <div id="carouselInventoryMobile" class="carousel slide carousel-fade" data-bs-interval="false">

            <div class="carousel-inner">

                <div class="carousel-item active">
                    <img src="{{asset('img/tridenta-front.jpg')}}" alt="Inventario disponible de Tridenta Towers" class="w-100 rounded-2 shadow-5">

                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" class="position-absolute start-0 top-0 px-0" viewBox="0 0 1446 1920">

                        @php $i=1; @endphp
                        @foreach ($sections as $section)
            
                            <a href="#tab-pane-{{$section->id}}" data-bs-target="#carouselInventoryMobile" data-bs-slide-to="{{ $i }}"  class="text-decoration-none link-light">
                                <polygon class="section-class" points="{{$section->points}}"></polygon>
                                
                                <text x="{{$section->text_x ?? 0;}}" y="{{$section->text_y ?? 0; }}"
                                    font-size="46" font-weight="bold" fill="#fff" class="fw-light">
            
                                    <tspan class="fw-bold">{{__('Torre')}} {{$section->name}}</tspan>
            
                                    @php
                                        $type_x = ($section->text_x ?? 0) + 3;
                                    @endphp
            
                                    @isset($section->subtitle)
                                        <tspan x="{{$type_x}}" dy="1.3em" font-size="36" font-weight="light">
                                            {{__('Nivel')}} {{$section->subtitle}}
                                        </tspan>
                                    @endisset
                                    
                                </text>
                            </a>    
                            @php $i++; @endphp
                        @endforeach
                    </svg>
                </div>
                
                    
                @foreach ( $sections as $section )
                    
                    <div class="carousel-item">
                        
                        <div class="position-relative">
                            <img src="{{ asset('media/'.$section->img_path) }}" alt="{{__('Torre')}} {{$section->name}} - {{__('Niveles')}} {{$section->subtitle}}" class="w-100 rounded-2 shadow-5">

                            @php
                                if($section->id == 5 or $section->id == 6 or $section->id == 7){
                                    $font_size = 22;
                                }
                                else{
                                    $font_size = 32;
                                }
                            @endphp

                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" class="position-absolute start-0 top-0 px-0" viewBox="{{$section->viewbox}}">

                                @foreach ($section->units as $unit)
                    
                                    <a href="{{route('dashboard.unit', ['id' => $unit->id]) }}" class="text-decoration-none link-light">
                                        <polygon class="{{ strtolower($unit->status) }}-class" points="{{$unit->shape->points ?? '0,0'}}"></polygon>
                                        
                                        <text x="{{$unit->shape->text_x ?? 0;}}" y="{{$unit->shape->text_y ?? 0; }}"
                                            font-size="{{$font_size}}" font-weight="bold" fill="#fff" class="fw-light">
                    
                                            <tspan class="fw-bold">{{$unit->name}}</tspan>
                                            
                                        </text>
                                    </a>    
                                    
                                @endforeach
                            </svg>

                        </div>

                        @if ($section->name == 'E')
                            <div class="fs-2 text-center fw-bold my-2">{{__('Torre') }} {{$section->name}}</div>
                        @else
                            <div class="fs-2 text-center fw-bold my-2">{{__('Torre') }} {{$section->name}}, {{__('Nivel')}} {{$section->subtitle}}</div>
                        @endif

                    </div>
                    
                @endforeach
              

            </div>
        </div>
      </div>

    </div>

    {{-- @include('components.contact-form') --}}

@endsection