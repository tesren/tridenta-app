@extends('layouts.admin-base')

@section('titles')
    <title>{{__('Mi Perfil - Tridenta Towers')}}</title>
@endsection

@section('content')

    <div class="row justify-content-center my-6">

        <div class="col-8 col-lg-3 align-self-center">
            @php
                $url = Gravatar::fallback('https://www.gravatar.com/avatar/de7554e3560de602155ce77b2eef85cb?s=300')->get($user->email, ['size'=>500]);
            @endphp
            <img src="{{$url}}" alt="Profile picture" class="w-100 rounded-circle">
        </div>

        <div class="col-12 col-lg-6">

            <h1>{{__('Mi perfil')}}</h1>
            <div class="text-secondary">{{$user->email}}</div>
            <p>{{__('Aquí puedes ver y modificar tus datos personales')}}</p>

            <form action="" method="post">

                <label for="user_name">{{__('Nombre')}}</label>
                <input type="text" class="contact-input mb-3" name="user_name" value="{{$user->name}}">

                <label for="user_phone">{{__('Teléfono')}}</label>
                <input type="text" class="contact-input mb-3" name="user_phone" value="{{$user->phone}}">

                <button type="submit" class="btn btn-blue">{{__('Guardar Cambios')}}</button>
            </form>

        </div>

    </div>

    @include('components.contact-form')

@endsection