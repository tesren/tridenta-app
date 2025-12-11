<div>

    @php
        $contact = request()->query('contact');
    @endphp

    @if ($contact != 'no')

        <a id="whatsapp" href="https://wa.me/52{{config('domus.whatsapp_number')}}?text={{ urlencode(__("Hola, vengo del sitio web de Tridenta")) }}" class="position-fixed bottom-0 end-0 z-3 m-3 text-center shadow d-none d-lg-flex" data-bs-toggle="tooltip" data-bs-title="{{ __('¡Envíanos un mensaje!') }}" target="_blank" rel="noopener noreferrer">
            <i class="fa-brands fa-3x fa-whatsapp align-self-center"></i>
        </a>

        <div class="fixed-bottom px-0 py-2 d-block d-lg-none bg-blue border-top border-light">
            <div class="row">

                <div class="col-7">
                    <div class="fw-light" style="font-size: 11px;">
                        WhatsApp
                    </div>
                    <div class="fs-6">{{__('Envíanos un mensaje')}}</div>
                </div>

                <div class="col-5 align-self-center">
                    <a class="btn btn-light w-100 fs-6" href="https://wa.me/52{{config('domus.whatsapp_number')}}?text={{__("Hola, vengo del sitio web de Tridenta")}}" target="_blank" rel="noopener noreferrer">
                        <i class="fa-brands fa-whatsapp"></i> WhatsApp
                    </a>
                </div>

            </div>
        </div>

    @endif

    @script
        <script>
            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
            const btn = document.getElementById('whatsapp');
            
            if (btn && window.innerWidth > 992) {
                const tooltip = new bootstrap.Tooltip(btn);
                tooltip.show();
            }

        </script>
    @endscript


</div>
