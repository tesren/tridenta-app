<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}


    @section('titles')
        <title>{{__('Búsqueda de Condominios')}} - Tridenta Towers</title>
        <meta name="description" content="{{__('Herramienta de búsqueda de Tridenta Towers, donde encontrar tu residencia ideal frente al mar es fácil y personalizado. Explora nuestra lista de condominios con opciones de filtrado por precio, piso, tipo y más, para encontrar exactamente lo que estás buscando. Con detalles y fotografías cautivadoras, esta búsqueda te acerca a tu hogar perfecto en el paraíso de Puerto Vallarta.')}}">
    @endsection

    @php
        $contact = request()->query('contact');
    @endphp

    <div class="container mt-5 mb-4">
        <h1>{{__('Búsqueda de Condominios')}}</h1>
        <p>{{__('Busca de forma mas práctica por medio de nuestro formulario y nuestra tabla.')}}</p>
        <div class="d-flex mb-4">
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

        <div class="container input-group justify-content-end mb-4 text-end ">
            <a href="{{route('inventory.bay', request()->query() )}}" class="btn btn-outline-blue rounded-end-0 rounded-start-circle" wire:navigate><i class="fa-solid fa-border-all"></i></a>
            <a href="{{route('search', request()->query() )}}" class="btn btn-outline-blue rounded-start-0 rounded-end-circle" wire:navigate><i class="fa-solid fa-list"></i></a>
        </div>

        
        {{-- Formulario de búsqueda --}}
        <div class="row justify-content-center mb-5">

            <div class="col-12 col-lg-10">
                <form wire:submit="search">

                    <div class="rounded-2 input-group shadow-4" id="search_input_group">
                                
                        <div class="form-floating mb-3 mb-lg-0">
        
                            <select class="form-select" id="floor" wire:model="floor" aria-label="{{__('Piso')}}">
                              <option value="0">{{__('Cualquier piso')}}</option>
        
                              @for ($i=1; $i<29; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                              @endfor
        
                            </select>
        
                            <label for="floor">{{__('Piso')}}</label>
                        </div>
        
                        <div class="form-floating mb-3 mb-lg-0">
                            <select class="form-select" id="bedrooms" wire:model="bedrooms" aria-label="{{__('Recámaras')}}">
                              <option value="0">{{__('Cualquier cantidad')}}</option>
                              <option value="10">{{__('Estudio')}}</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                            </select>
                            <label for="bedrooms">{{__('Recámaras')}}</label>
                        </div>
        
                        <div class="form-floating mb-3 mb-lg-0">
                            <select class="form-select" id="min_price" wire:model="min_price" aria-label="{{__('Precio min.')}}">
                                <option value="1">{{__('Sin mínimo')}}</option>
                                @php
                                    $minPriceStart = 200000;
                                    $maxPrice = 900000;
                                @endphp
                                @for($price = $minPriceStart; $price <= $maxPrice; $price += 100000)
                                    <option value="{{ $price }}">${{ number_format($price / 1000) }}k</option>
                                @endfor
                                    <option value="1000000">$1m</option>
                            </select>
                            <label for="min_price">{{__('Precio min.')}}</label>
                        </div>
                        
                        <div class="form-floating mb-3 mb-lg-0">
                            <select class="form-select" id="max_price" wire:model="max_price" aria-label="{{__('Precio max.')}}">
                                <option value="9999999999">{{__('Sin máximo')}}</option>
                                @php
                                    $maxPriceStart = 300000;
                                    $maxPrice = 900000;
                                @endphp
                                @for($price = $maxPriceStart; $price <= $maxPrice; $price += 100000)
                                    <option  value="{{ $price }}">${{ number_format($price / 1000) }}k</option>
                                @endfor
                                    <option value="1000000">$1m</option>
                                    <option value="1100000">$1.1m</option>
                            </select>
                            <label for="max_price">{{__('Precio max.')}}</label>
                        </div>
                        
        
                        <button type="submit" class="btn btn-blue rounded-end-2 col-12 col-lg-1" aria-label="{{__('Buscar')}}">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </form>
            </div>
        
        </div>

    </div>

    <div class="px-3 mb-6" style="min-height: 50vh;">
        <div class="table-responsive shadow-5 mb-3">
            <table class="table table-sm  table-light mb-0">

                <thead>
                    <th>{{__('Unidad')}}</th>
                    <th>{{__('Piso')}}</th>
                    <th class="d-none d-lg-table-cell">{{__('Tipo')}}</th>
                    <th>{{__('Recámaras')}}</th>
                    <th class="d-none d-lg-table-cell">{{__('Baños')}}</th>
                    <th>{{__('m²')}}</th>
                    <th>{{__('Precio')}}</th>
                    <th></th>
                </thead>

                <tbody>

                    @if ($units->isNotEmpty())
                        @foreach ($units as $unit)
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

                            <tr wire:key={{$unit->id}}>
                                <td class="{{$badgeBg}} text-light text-center fw-bold">{{ $unit->name }}</td>
                                <td>{{ $unit->floor }}</td>
                                <td class="d-none d-lg-table-cell">{{__('Tipo')}} {{ $unit->unitType->name }}</td>

                                <td>
                                    @if ($unit->unitType->bedrooms == 0)
                                        {{__('Estudio')}}
                                    @else
                                        {{ $unit->unitType->bedrooms }}
                                        @if ($unit->unitType->flexrooms > 0)
                                            {{' + Flex'}}
                                        @endif
                                    @endif
                                </td>

                                <td class="d-none d-lg-table-cell">{{ $unit->unitType->bathrooms }}</td>
                                <td>{{ $unit->unitType->const_total }} </td>
                                <td>
                                    @if ($unit->price != 0 and $unit->status == 'Disponible')
                                        ${{ number_format($unit->price) }} {{$unit->currency}}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('unit', ['name'=>$unit->name, 'contact' => $contact ]) }}" class="btn btn-blue" target="_blank" wire:navigate rel="noopener noreferrer">
                                        {{__('Ver más')}}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                    
                        <tr>
                            <td class="text-center fs-5 py-3" colspan="9">
                                {{__('Lo sentimos, no hay resultados para su búsqueda')}}
                            </td>
                        </tr>

                    @endif

                </tbody>

            </table>
        </div>

        {{ $units->links() }}

    </div>

    {{-- @include('components.contact-form') --}}

</div>
