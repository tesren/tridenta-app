@extends('layouts.admin-base')

@section('titles')
    <title>{{__('Búsqueda de Unidades - Tridenta Towers')}}</title>
@endsection

@section('content')

    <div class="container mt-5 mb-4">

        <div class="row justify-content-between mb-5">
            
            <div class="col-12 col-lg-7 px-2 px-lg-0">
                <h1>{{__('Búsqueda de condominios')}}</h1>
                <p>{{__('Busca de forma mas práctica por medio de nuestro formulario y nuestra tabla.')}}</p>
                <div class="d-flex mb-5">
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
            </div>
    
            <div class="col-12 col-lg-5 align-self-center mt-5 mt-lg-0">

                <div class="text-start text-lg-end fs-5 fw-light mb-2">
                    {{__('Cambia el modo de visualización del inventario')}}
                </div>

                <div class="container input-group justify-content-start justify-content-lg-end mb-3 text-end px-0 px-lg-2">

                    <a href="{{route('dashboard.inventory.bay')}}" class="btn btn-outline-blue rounded-end-0 rounded-start-circle" title="{{__('Modo Gráfico')}}">
                        <i class="fa-solid fa-border-all"></i>
                    </a>

                    <a href="{{route('dashboard.search')}}" class="btn btn-outline-blue rounded-start-0 rounded-end-circle" title="{{__('Modo Lista')}}">
                        <i class="fa-solid fa-list"></i>
                    </a>

                </div>

            </div>

        </div>

        @include('components.search-form')
    </div>

    <div class="px-3 px-lg-5 mb-6" style="min-height: 50vh;">
        <div class="table-responsive shadow-5 mb-3">
            <table class="table table-sm  table-light mb-0">
    
                <thead>
                    <th>{{__('Favorito')}}</th>
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

                            <tr>
                                <td class="text-center">
                                    @if ( !null == $unit->users()->wherePivot('unit_id', $unit->id)->wherePivot('user_id', auth()->user()->id)->first() )
                                        <form action="{{ route('user.delete.unit', ['id' => $unit->id ]) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            
                                            <input type="hidden" value="{{ $unit->id }}" name="unit_id">
                                            <button class="btn py-0 fs-4" type="submit" title="{{__('Quitar de favoritos')}}" onclick="this.disabled=true;this.form.submit();"><i class="fa-solid text-danger fa-heart"></i></button>
                                        </form>
                                    @else
                                        <form action="{{ route('user.store.unit') }}" method="post">
                                            @csrf
                                            <input type="hidden" value="{{ $unit->id }}" name="unit_id">
                                            <button class="btn py-0 fs-4" type="submit" title="{{__('Agregar a favoritos')}}" onclick="this.disabled=true;this.form.submit();" ><i class="fa-regular text-danger fa-heart"></i></button>
                                        </form>
                                    @endif
                                </td>
                                <td class="{{$badgeBg}} text-light text-center fw-bold">{{ $unit->name }}</td>
                                <td>{{ $unit->floor }}</td>
                                <td class="d-none d-lg-table-cell">{{__('Tipo')}} {{ $unit->unitType->name }}</td>

                                <td>
                                    @if ($unit->unitType->bedrooms == 0)
                                        {{__('Estudio')}}
                                    @else
                                        {{ $unit->unitType->bedrooms }}
                                        @if ($unit->unitType->flexrooms > 0)
                                            {{__(' + Flex')}}
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
                                    <a href="{{ route('dashboard.unit', ['id'=>$unit->id]) }}" class="btn btn-blue" target="_blank" rel="noopener noreferrer">
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

@endsection