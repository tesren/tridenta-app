<section class="row" title="Formulario de contacto" id="contact">

    <div class="col-12 col-lg-5 ps-0 d-none d-lg-block">
        <img class="w-100 h-100" src="{{asset('/img/contact-form.webp')}}" alt="Tridenta Towers formulario de contacto" style="object-fit: cover;">
    </div>

    <div class="col-12 col-lg-7 align-self-center mt-4 mt-lg-0 px-3 px-lg-5">

        <h6 class="fs-2 text-brown px-2 mb-0 text-center text-lg-start mt-5">{{__('¿Te gustaría contactar a tu asesor?')}}</h6>
        <p class="fs-6 text-lightbrown px-2 mb-4 text-center text-lg-start">{{__('Completa el formulario para enviarle un mensaje.')}}</p>

        {{-- Formulario --}}
        <form action="{{route('send.email')}}#contact" method="post" onsubmit="disableBtn()">
            @csrf
        
            <div class="row">

                <div class="col-12">
                    <label for="full_name">{{__('Nombre')}}</label>
                    <input type="text" name="full_name" id="full_name" class="contact-input mb-3" required value="{{ auth()->user()->name }}">
                </div>

                <x-honeypot/>

                <div class="col-12">
                    <label for="email">{{__('Correo')}}</label>
                    <input type="email" name="email" id="email" class="contact-input mb-3" required value="{{ auth()->user()->email }}">
                </div>

                <div class="col-12">
                    <label for="phone">{{__('Teléfono')}}</label>
                    <input type="tel" name="phone" id="phone" class="contact-input mb-3" required value="{{ auth()->user()->phone }}">
                </div>

                <div class="col-12">
                    <textarea name="message" id="message" cols="30" class="contact-input mb-4" rows="3" placeholder="{{__('Mensaje')}}">{{old('message')}}</textarea>
                </div>

                <input type="hidden" name="url" id="url" value="{{ request()->fullUrl() }}">

                <div class="col-12 mb-5">
                    <button type="submit" id="submit-btn" class="btn btn-blue rounded-0 shadow-4 w-100" @if(session('message')) disabled @endif>
                        {{__('Enviar')}}
                    </button>
                </div>

            </div>

        </form>

        {{-- Mensaje de éxito --}}
        @if (session('message'))
            <div class="p-3 text-success fw-semibold fs-5 text-center mb-4">
                <i class="fa-regular fa-circle-check"></i> {{__(session('message'))}}
            </div>
        @endif

        {{-- Errores --}}
        @if (session('errors'))
            @php
                $errors = session('errors');
            @endphp
            <div class="p-3 text-danger">
                @foreach ($errors as $error)
                    <div class="mb-2"><i class="fa-regular fa-circle-xmark"></i> {{$error}}</div>
                @endforeach
            </div>
        @endif

        {{-- Javascript --}}
        <script>
            function disableBtn(){
                const msgButton = document.getElementById("submit-btn");
                msgButton.setAttribute("disabled", "true");
            }
        </script>

    </div>

</section>