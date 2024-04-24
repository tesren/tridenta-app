@extends('layouts.admin-base')

@section('titles')
    <title>{{__('Inventario - Tridenta Towers')}}</title>
@endsection

@section('content')

    <div class="container my-6">
        <h1>{{__('Condominios en Preventa')}}</h1>
        <p>{{__('Da clic en un condominio para ver más información')}}</p>
        <div class="d-flex mb-1">
            <div class="me-3">
                <span class="px-2 py-1 bg-success text-success rounded-2">D</span> {{__('Disponible')}}
            </div>

            <div class="me-3">
                <span class="px-2 py-1 bg-warning text-warning rounded-2">A</span> {{__('Apartado')}}
            </div>

            <div>
                <span class="px-2 py-1 bg-danger text-danger rounded-2">V</span> {{__('Vendido')}}
            </div>
        </div>

        <div class="container input-group justify-content-end mb-3 text-end">
            <a href="{{route('dashboard.inventory')}}" class="btn btn-outline-blue rounded-end-0 rounded-start-circle"><i class="fa-solid fa-border-all"></i></a>
            <a href="{{route('dashboard.search')}}" class="btn btn-outline-blue rounded-start-0 rounded-end-circle"><i class="fa-solid fa-list"></i></a>
        </div>

        {{-- Inventario --}}
        <div class="row justify-content-evenly">

            <div class="col-12 col-lg-5 position-relative p-0 nav nav-tabs" id="myTab" role="tablist">
                <img src="{{asset('img/tridenta-front.jpg')}}" alt="Inventario disponible de Tridenta Towers" class="w-100 rounded-2 shadow-5">

                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" class="position-absolute start-0 top-0 px-2 px-lg-0" viewBox="0 0 1446 1920">

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

                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" class="position-absolute start-0 top-0 px-2 px-lg-0" viewBox="{{$section->viewbox}}">

                                    @foreach ($section->units as $unit)
                        
                                        <a href="{{route('dashboard.unit', ['id' => $unit->id]) }}" class="text-decoration-none link-light">
                                            <polygon class="section-class" points="{{$unit->shape->points}}"></polygon>
                                            
                                            <text x="{{$unit->shape->text_x ?? 0;}}" y="{{$unit->shape->text_y ?? 0; }}"
                                                font-size="32" font-weight="bold" fill="#fff" class="fw-light">
                        
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

    </div>

    @include('components.contact-form')

@endsection