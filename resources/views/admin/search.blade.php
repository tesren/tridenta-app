@extends('layouts.admin-base')

@section('titles')
    <title>{{__('Búsqueda de Unidades - Tridenta Towers')}}</title>
@endsection

@section('content')

    <div class="container mt-5 mb-6">
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

        <div class="container input-group justify-content-end mb-4 text-end ">
            <a href="{{route('dashboard.inventory')}}" class="btn btn-outline-blue rounded-end-0 rounded-start-circle"><i class="fa-solid fa-border-all"></i></a>
            <a href="{{route('dashboard.search')}}" class="btn btn-outline-blue rounded-start-0 rounded-end-circle"><i class="fa-solid fa-list"></i></a>
        </div>

        @include('components.search-form')

        <table class="table">

            <thead>
                <th></th>
                <th>{{__('Unidad')}}</th>
                <th>{{__('Piso')}}</th>
                <th>{{__('Tipo')}}</th>
                <th>{{__('Recámaras')}}</th>
                <th>{{__('Baños')}}</th>
                <th>{{__('m²')}}</th>
                <th>{{__('Precio')}}</th>
            </thead>

            <tbody>



            </tbody>

        </table>

    </div>

    @include('components.contact-form')

@endsection