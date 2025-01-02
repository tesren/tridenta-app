<div>

    @php
        $contact = request()->query('contact');
    @endphp

    @if ($contact != 'no')
        <a id="whatsapp" href="https://wa.me/523322005523?text={{ urlencode(__("Hola, vengo del sitio web de Tridenta")) }}" class="position-fixed bottom-0 end-0 z-3 m-3 text-center shadow" data-bs-toggle="tooltip" data-bs-title="{{ __('¡Envíanos un mensaje!') }}" target="_blank" rel="noopener noreferrer">
            <i class="fa-brands fa-3x fa-whatsapp align-self-center"></i>
        </a>
    @endif

    @script
        <script>
            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
        </script>
    @endscript


</div>
