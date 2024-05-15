<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}

    @section('titles')
        <title>{{__('Avances de Obra')}} - Tridenta Towers</title>
        <meta name="description" content="{{__('Avances mensuales de Tridenta Towers en Puerto Vallarta. Nuestra página de avances de obra te ofrece una visión detallada de la evolución de esta espectacular torre de condominios frente al mar.')}}">
    @endsection

    {{-- Do your work, then step back. --}}
    <section class="position-relative">

        <img src="{{asset('img/const-page-bg.webp')}}" alt="Áreas comunes de Tridenta Towers" class="w-100" style="height: 25vh; object-fit:cover;">

        <div class="fondo-azul"></div>

        <div class="row position-absolute top-0 start-0 h-100">

            <div class="col-12 align-self-center text-white">
                <h1 class="fw-semi-bold fs-0 text-center">
                    {{__('Avances de Obra')}}
                </h1>
            </div>

        </div>

    </section>


    @if ( count($const_updates) > 0 )
    
        <div class="row justify-content-center mb-5 position-relative pt-5">

            <img class="position-absolute top-0 start-0 px-0 col-5 col-lg-4" src="{{asset('img/diagonal-stripes.webp')}}" alt="">
            <img class="position-absolute top-50 end-0 px-0 col-3 col-lg-2" src="{{asset('img/half-circle.webp')}}" alt="">    

            @foreach ($const_updates as $update)
                <div class="card rounded-0 col-11 col-lg-8 col-xxl-7 mb-5 p-0 shadow-5">
                    
                    @php
                        $portrait = asset('media/'.$update->portrait_path);
                        $date = __(date_format($update->date, 'F')).' '.date_format($update->date, 'Y');
                        $images = $update->getMedia('gallery_construction');
                    @endphp

                    <div class="position-relative">
                        <img src="{{$portrait}}" class="w-100" alt="Avance de Obra Tridenta Towers - {{$date}}" style="max-height: 470px; object-fit:cover;">
                        <div class="row position-absolute top-0 start-0 justify-content-center h-100">
                            <div class="col-12 text-center align-self-center">
                                <a href="#construction-{{$update->id}}-1" class="link-light" aria-label="Ver avance de obra de {{$date}}"><i class="fa-solid fa-4x fa-play"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body bg-darkblue d-flex position-relative overflow-hidden">
                        <img class="position-absolute top-0 start-0 px-0 col-5 col-lg-3" src="{{asset('img/diagonal-stripes.webp')}}" alt="" style="mix-blend-mode: multiply;">

                        <img class="me-4 align-self-center" src="{{asset('img/tridenta-full-logo.webp')}}" alt="Logo de Tridenta Towers" width="150px">            
                        <h2 class="mb-0 lh-1 fw-light">{{$date}} <br> <span class="fs-5">{{__('Avance de Obra')}}</span> </h2>
                        
                    </div>

                    @if ($update->video_link)
                        <a href="{{$update->video_link}}" data-fancybox="construction-{{$update->id}}" class="d-none">{{__('Video de avance de obra')}} Tridenta Towers - {{$date}}</a>
                    @endif

                    @foreach ($images as $image)
                        <img src="{{$image->getUrl('large')}}" alt="Avance de Obra Tridenta Towers - {{$date}}" class="w-100 d-none" data-fancybox="construction-{{$update->id}}">
                    @endforeach
                      
                </div>
            @endforeach
        </div>

        {{ $const_updates->links() }}
        
    @endif

</div>
