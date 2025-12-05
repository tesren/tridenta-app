<div class="mb-5 mb-lg-0">
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    @php
        $contact = request()->query('contact');
    @endphp

    <footer class="container-fluid bg-blue py-4 py-lg-5">

        <div class="row justify-content-evenly">
    
            <div class="col-8 col-lg-3 col-xxl-2 mb-4 mb-lg-0 align-self-center">
                <img src="{{asset('img/tridenta-full-logo.webp')}}" alt="Logo de Tridenta Towers" class="w-100">
            </div>
    
            @if ($contact != 'no')

                <div class="col-11 col-lg-3 align-self-center mb-4 mb-lg-0">
                    <div class="fs-3">{{__('Contacto')}}</div>
        
                    <a href="mailto:info@domusvallarta.com" class="link-light fw-light text-decoration-none d-block mb-3 fs-5"><i class="fa-solid fa-envelope"></i> info@domusvallarta.com</a>
                    <a href="tel:+52{{env('CONTACT_NUMBER')}}" class="link-light fw-light text-decoration-none d-block mb-3 fs-5"><i class="fa-solid fa-phone"></i> {{env('DISPLAY_NUMBER')}}</a>
                    <address class="fs-5 fw-light"><i class="fa-solid fa-location-dot"></i> Febronio Uribe 170, Zona Hotelera, Las Glorias, 48333 Puerto Vallarta, Jal.</address>
                </div>
    
                <div class="col-10 col-lg-2 align-self-center mb-4 mb-lg-0">

                    <a href="https://domusvallarta.com" class="text-decoration-none link-light fw-light">
                        <div class="text-center fs-6 mb-2">{{__('Comercializador Exclusivo')}}</div>
                        <img src="{{asset('img/domus-logo-white.svg')}}" alt="Logo de Domus Vallarta Inmobiliaria" class="w-100">
                    </a>

                    <div class="d-flex justify-content-center mt-3">

                        <a href="https://www.instagram.com/domus_vallarta/" target="_blank" rel="noopener noreferrer" class="d-block text-decoration-none link-light fw-light me-3 fs-4">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
        
                        <a href="https://www.facebook.com/DomusVallartaInmobiliaria" target="_blank" rel="noopener noreferrer" class="d-block text-decoration-none link-light fw-light fs-4">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                    </div>

                </div>
                
            @endif
    
        </div>
    
    </footer>
    
    <div class="px-2 pt-2 pb-3 pb-lg-2 bg-lightblue text-center">
        <i class="fa-regular fa-copyright"></i> Copyright {{date('Y')}} {{__('Todos los derechos reservados')}} | <a href="{{route('privacy.policy')}}" wire:navigate class="link-light fw-light">{{__('Aviso de Privacidad')}}</a>
         | 
        <a href="https://punto401.com" class="link-light fw-light text-decoration-none">
            {{__('Creado por')}} <img width="70px" src="{{asset('img/logo-punto401.webp')}}" alt="Logo de Punto401 Marketing">
        </a>
    </div>

</div>