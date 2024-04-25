@extends('layouts.admin-base')

@section('titles')
    <title>{{__('Unidades Guardadas - Tridenta Towers')}}</title>
@endsection

@section('content')

    <div class="container my-6">

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
                            <img src="{{ $blueprint[0]->getUrl('medium') }}" class="w-100 rounded-3" alt="Planos de la unidad {{$unit->name}} de Tridenta Towers">
                        </div>

                        <div class="col-lg-8">
                            <div class="card-body text-darkblue">

                                <div class="d-flex justify-content-end">
                                    <div class="badge {{$badgeBg}} rounded-pill mb-2 fs-5 fw-light">
                                        {{$unit->status}}
                                    </div>
                        
                                    <div class="">
                                        <form action="" method="post">
                                            <input type="hidden" name="unit_id" value="{{$unit->id}}">
                                            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                            <button type="submit" class="btn pe-0 pt-0">
                                                <i class="fa-regular fa-heart fa-2x text-danger"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>

                                <h2 class="card-title">{{__('Unidad')}} {{$unit->name}}</h2>
                                <div class="fs-1">${{ number_format($unit->price) }} {{$unit->currency}}</div>
                                <div class="fs-4 fw-light text-secondary mb-4">{{__('Tipo')}} {{$unit->unitType->name}}</div>
                                <div class="d-flex mb-4 fs-5">

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

        @else

            <h1>{{__('Aún no tienes unidades guardadas')}}</h1>
            <p>{{__('Visita nuestro inventario para ver todas las unidades')}}</p>
            <a href="{{route('dashboard.inventory')}}" class="btn btn-blue">
                {{__('Ver Inventario')}}
            </a>

        @endif
        
    </div>

@endsection