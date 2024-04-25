@extends('layouts.admin-base')

@section('titles')
    <title>{{__('Unidades Guardadas - Tridenta Towers')}}</title>
@endsection

@section('content')

    <div class="container my-6" style="min-height: 87vh;">

        @if ($units->isNotEmpty())

            <h1>{{__('Unidades Guardadas')}}</h1>
            <p>{{__('Haga clic en las tarjetas para ver más información sobre la unidad.')}}</p>

            @foreach ($units as $unit)

                @php
                    $blueprint = $unit->unitType->getMedia('blueprints');

                    if($unit->status == 'Disponible'){
                        $badgeBg = 'bg-success';
                    }elseif($unit->status == 'Apartada'){
                        $badgeBg = 'bg-warning';
                    }
                    else{
                        $badgeBg = 'bg-danger';
                    }
                @endphp
                <div class="card mb-3 shadow-5 rounded-3">
                    <div class="row g-0">

                        <div class="col-lg-4">
                            <img src="{{ $blueprint[0]->getUrl('medium') }}" class="w-100 rounded-3 p-3" alt="Planos de la unidad {{$unit->name}} de Tridenta Towers">
                        </div>

                        <div class="col-lg-8">
                            <div class="card-body text-darkblue">

                                <div class="d-flex justify-content-start justify-content-lg-end">
                                    <div class="badge {{$badgeBg}} rounded-pill mb-2 fs-5 fw-light align-self-center">
                                        {{$unit->status}}
                                    </div>
                        
                                    <div class="">
                                        <form action="{{ route('user.delete.unit', ['id' => $unit->id ]) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            
                                            <input type="hidden" value="{{ $unit->id }}" name="unit_id">
                                            <button class="btn fs-3" type="submit" title="{{__('Quitar de favoritos')}}" onclick="this.disabled=true;this.form.submit();"><i class="fa-solid text-danger fa-heart"></i></button>
                                        </form>
                                    </div>
                                </div>

                                <h2 class="card-title">{{__('Unidad')}} {{$unit->name}}</h2>
                                <div class="fs-1">${{ number_format($unit->price) }} {{$unit->currency}}</div>
                                <div class="fs-4 fw-light text-secondary mb-4">{{__('Tipo')}} {{$unit->unitType->name}}</div>
                                <div class="d-flex justify-content-center justify-content-lg-start mb-4 fs-5">

                                    <div>
                                        <i class="fa-solid fa-bed"></i> {{$unit->unitType->bedrooms}} <span class="d-none d-lg-inline fw-light">{{__('Recámaras')}}</span>
                                    </div>
                    
                                    <div class="mx-3">
                                        <i class="fa-solid fa-bath"></i> {{$unit->unitType->bathrooms}} <span class="d-none d-lg-inline fw-light">{{__('Baños')}}</span>
                                    </div>
                    
                                    <div>
                                        <i class="fa-solid fa-house-chimney"></i> {{__('Total')}}: {{$unit->unitType->const_total}} {{__('m²')}}
                                    </div>
                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            @endforeach

            <div class="text-center my-5">
                <a href="{{route('dashboard.inventory')}}" class="btn btn-blue">
                    {{__('Ver todo el inventario')}}
                </a>    
            </div>

        @else

            <h1>{{__('Aún no tienes unidades guardadas')}}</h1>
            <p>{{__('Visita nuestro inventario para ver todas las unidades')}}</p>
            <a href="{{route('dashboard.inventory')}}" class="btn btn-blue">
                {{__('Ver Inventario')}}
            </a>

        @endif
        
    </div>

@endsection