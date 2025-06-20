<div>
    {{-- The best athlete wants his opponent at his best. --}}
    @section('titles')
        <title>Tridenta Towers - {{__('Inventario')}}</title>
        <meta name="description" content="{{__('Descubre Tridenta Towers, de los creadores de Harbor171, condominios frente al mar en la zona hotelera de Puerto Vallarta. Estos exclusivos condominios en preventa ofrecen un estilo de vida único con vistas panorámicas, amenidades de lujo y acceso directo a la playa. ¡Aprovecha los precios de preventa y asegura tu lugar en esta icónica torre de condominios en el paraíso!')}}">
    @endsection

    @php
        $contact = request()->query('contact');
    @endphp

    <div class="container mb-6 mt-5 px-2 px-lg-0">


        <div class="row justify-content-between mb-5">

            <div class="col-12 col-lg-7 px-2 px-lg-0">
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
            </div>

            <div class="col-12 col-lg-5 align-self-center mt-5 mt-lg-0">

                <div class="text-start text-lg-end fs-5 fw-light mb-2">
                    {{__('Cambia el modo de visualización del inventario')}}
                </div>

                <div class="container input-group justify-content-start justify-content-lg-end mb-3 text-end px-0 px-lg-2">

                    <a href="{{route('inventory.bay', request()->query() )}}" wire:navigate class="btn btn-outline-blue rounded-end-0 rounded-start-circle" title="{{__('Modo Gráfico')}}">
                        <i class="fa-solid fa-border-all"></i>
                    </a>

                    <a href="{{route('search', request()->query() )}}" wire:navigate class="btn btn-outline-blue rounded-start-0 rounded-end-circle" title="{{__('Modo Lista')}}">
                        <i class="fa-solid fa-list"></i>
                    </a>

                </div>

            </div>

        </div>

        

        {{-- Vistas de la torre --}}
        <h2 class="mb-3 px-2 px-lg-0">{{__('Escoge la vista que prefieras')}}</h2>
        <ul class="nav nav-pills mb-5 mb-lg-4 px-2 px-lg-0" role="tablist" id="inventory-navigation">

            <li class="nav-item me-2" role="presentation">
                <a href="{{route('inventory.bay' , request()->query() )}}" wire:navigate class="nav-link @if(strpos($route, 'bay') ) active @endif" id="home-tab" role="tab" >
                    {{__('Vista Bahía')}}
                </a>
            </li>

            <li class="nav-item" role="presentation">
                <a href="{{route('inventory.sierra', request()->query() )}}" wire:navigate class="nav-link @if(strpos($route, 'sierra') ) active @endif" id="profile-tab" role="tab" >
                    {{__('Vista Sierra')}}
                </a>
            </li>

        </ul>


        {{-- Inventario escritorio --}}
        <div class="row justify-content-between d-none d-lg-flex">
            <div class="col-12 col-lg-5 position-relative px-0" role="tablist">

                <img src="{{asset($img_view_path)}}" alt="Inventario disponible de Tridenta Towers" class="w-100 rounded-2 shadow-5">

                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" class="position-absolute start-0 top-0 px-0" viewBox="0 0 1081 1921">

                    @foreach ($sections as $section)
        
                        <a href="#tab-pane-{{$section->id}}" class="text-decoration-none link-light" id="tab-{{$section->id}}" data-bs-toggle="pill" data-bs-target="#tab-pane-{{$section->id}}" role="tab" >
                            <polygon class="section-class" points="{{$section->points}}"></polygon>
                            
                            <text x="{{$section->text_x ?? 0;}}" y="{{$section->text_y ?? 0; }}"
                                font-size="40" fill="#fff" class="fw-light">
        
                                @isset($section->subtitle)
                                    <tspan>{{$section->subtitle}}</tspan>
                                @endisset
                                
                            </text>
                        </a>    
                        
                    @endforeach
                </svg>

            </div>

            <div class="col-12 col-lg-6 px-0 position-relative align-self-center tab-content">
                @php $i=0; @endphp 

                @foreach ($sections as $section)

                    <div class="tab-pane fade @if($i==0) @endif" id="tab-pane-{{$section->id}}" role="tabpanel" tabindex="0">

                        <img src="{{ asset('media/'.$section->img_path) }}" alt="{{__('Torre')}} {{$section->name}} - {{__('Niveles')}} {{$section->subtitle}}" class="w-100 shadow rounded-3">

                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" class="position-absolute start-0 top-0 px-0" viewBox="{{$section->viewbox}}">

                            @foreach ($section->units as $unit)
                
                                <a href="{{route('unit', ['name' => $unit->name, 'contact' => $contact ]) }}" wire:navigate class="text-decoration-none link-light {{ strtolower($unit->status) }}-class">
                                    @isset($unit->shape->form_type)
                                        @if ($unit->shape->form_type == 'rect')
                                            <rect x="{{$unit->shape->rect_x ?? '0'}}" y="{{$unit->shape->rect_y ?? '0'}}" width="{{$unit->shape->width ?? '0'}}" height="{{$unit->shape->height ?? '0'}}"/>
                                        @else
                                            <polygon class="" points="{{$unit->shape->points ?? '0,0'}}"></polygon>
                                        @endif
                                    @endisset
                                    
                                    <text x="{{$unit->shape->text_x ?? 0;}}" y="{{$unit->shape->text_y ?? 0; }}"
                                        font-size="30" font-weight="bold" fill="#fff" class="fw-light">
                
                                        <tspan class="fw-bold">{{$unit->name}}</tspan>
                                        
                                    </text>
                                </a>    
                                
                            @endforeach
                        </svg>
                    </div>

                    @php $i++; @endphp 

                @endforeach
                
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
                        <img src="{{asset($img_view_path)}}" alt="Inventario disponible de Tridenta Towers" class="w-100 rounded-2 shadow-5">
    
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" class="position-absolute start-0 top-0 px-0" viewBox="0 0 1081 1921">
    
                            @php $i=1; @endphp
                            @foreach ($sections as $section)
                
                                <a href="#tab-pane-{{$section->id}}" data-bs-target="#carouselInventoryMobile" data-bs-slide-to="{{ $i }}"  class="text-decoration-none link-light">
                                    <polygon class="section-class" points="{{$section->points}}"></polygon>
                                    
                                    <text x="{{$section->text_x ?? 0;}}" y="{{$section->text_y ?? 0; }}"
                                        font-size="30" font-weight="bold" fill="#fff" class="fw-light">
                
                                        @isset($section->subtitle)
                                            <tspan font-weight="light">
                                                {{$section->subtitle}}
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
                        
                                        <a href="{{route('unit', ['name' => $unit->name, 'contact' => $contact]) }}" wire:navigate class="text-decoration-none link-light {{ strtolower($unit->status) }}-class">
                                            @isset($unit->shape->form_type)
                                                @if ($unit->shape->form_type == 'rect')
                                                    <rect x="{{$unit->shape->rect_x ?? '0'}}" y="{{$unit->shape->rect_y ?? '0'}}" width="{{$unit->shape->width ?? '0'}}" height="{{$unit->shape->height ?? '0'}}"/>
                                                @else
                                                    <polygon class="" points="{{$unit->shape->points ?? '0,0'}}"></polygon>
                                                @endif
                                            @endisset
                                            
                                            <text x="{{$unit->shape->text_x ?? 0;}}" y="{{$unit->shape->text_y ?? 0; }}"
                                                font-size="{{$font_size}}" font-weight="bold" fill="#fff" class="fw-light">
                        
                                                <tspan class="fw-bold">{{$unit->name}}</tspan>
                                                
                                            </text>
                                        </a>    
                                        
                                    @endforeach
                                </svg>
    
                            </div>
    
                            
                            <div class="fs-2 text-center fw-bold my-2">{{$section->name}}, {{__('Nivel')}} {{$section->subtitle}}</div>
                            
    
                        </div>
                        
                    @endforeach
                  
    
                </div>
            </div>
        </div>

    </div>

</div>
