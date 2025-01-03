<div>
    {{-- The Master doesn't talk, he acts. --}}

    @section('titles')
        <title>{{__('Evento de Presentación')}} - Tridenta Towers</title>
        <meta name="description" content="{{__('Asiste al evento exclusivo de Tridenta Towers en Harbor171, Puerto Vallarta. Fecha: 15 de enero, 9:00 am. Bebidas y snacks incluidos. ¡Reserva tu lugar ahora!')}}">
    @endsection


    <div class="row justify-content-center py-5 h-100 text-white" style="background-image: url('{{asset('/img/beach-club-pools-tridenta.jpeg')}}')">
        <div class="col-12 col-lg-7 col-xxl-6 align-self-center py-4 rounded-3 shadow px-4 my-5 bg-glass" >
            <h1 class="fs-2 px-2 text-center text-lg-start">{{__('Presentación de Tridenta Towers')}}</h1>

            <p class="fs-6 px-2 mb-4 text-center text-lg-start">
                {{__('Te invitamos a un exclusivo evento de presentación donde conocerás nuestro nuevo desarrollo inmobiliario: Tridenta Towers, una oportunidad única de inversión y estilo de vida frente al mar.')}}
            </p>

            <h2 class="fs-3">{{__('Detalles del evento:')}}</h2>
            <ul class="list-unstyled fs-6">
                <li class="mb-2">📍 {{__('Lugar: Rooftop de de Harbor171 Torre Norte, Febronio Uribe 171, Las Glorias, Puerto Vallarta, Jalisco.')}}</li>
                <li class="mb-2">📅 {{__('Fecha: 15 de Enero a las 5:00 pm')}}</li>
                <li class="mb-2">🍷 {{__('Incluye: Bebidas y Snacks.')}}</li>
                <li>🚙 {{__('Valet Parking')}}</li>
            </ul>
            <p class="mb-4 fs-5 fw-bold">{{__('Reserva tu lugar ahora completando este formulario.')}}</p>
    
            <form wire:submit="save">
                    
                <div class="row">
        
                    <div class="col-12 px-0">
                        <label for="full_name">{{__('Nombre')}}</label>
                        <input type="text" wire:model="full_name" id="full_name" class="form-control mb-3 @error('full_name') is-invalid @enderror" required>
                    </div>
        
                    <x-honeypot/>
        
                    <div class="col-12 px-0">
                        <label for="email">{{__('Correo')}}</label>
                        <input type="email" wire:model="email" id="email" class="form-control mb-3" required>
                    </div>
        
                    <div class="col-12 px-0">
                        <label for="phone">{{__('Teléfono')}}</label>
                        <input type="tel" wire:model="phone" id="phone" class="form-control mb-3">
                    </div>

                    <div class="col-12 px-0 mb-3">
                        <label for="lang">{{__('Lenguaje')}}</label>
                        <select id="lang" wire:model="lang" class="form-select" required>
                            <option value="es">Español</option>
                            <option value="en">English</option>
                            <option value="fr">Français</option>
                        </select>
                    </div>

                    <div class="col-12 px-0 mb-3">
                        <label for="agent">{{__('Tu agente de Domus')}}</label>
                        <input type="text" wire:model="agent" id="agent" class="form-control" required>
                    </div>
        
                    <div class="col-12 px-0">
                        <label for="phone">{{__('Notas')}}</label>
                        <textarea wire:model="message" id="message" cols="30" required class="form-control mb-4" rows="2"></textarea>
                    </div>
        
                    <input type="hidden" wire:model="url" id="url" value="{{ request()->fullUrl() }}">
        
                    <div class="col-12 px-0">
                        <button type="submit" class="btn btn-light rounded-0 shadow-4 w-100" @if(session('message')) disabled @endif>
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

            <div wire:loading class="text-center fs-5 my-3 text-warning"> 
                <i class="fa-solid fa-spin fa-spinner"></i> {{__('Enviando, por favor espere')}}
            </div>

        </div>
    </div>

</div>
