<div class="row justify-content-center mb-5">

    <div class="col-12 col-lg-10">
        <form action="{{route('dashboard.search')}}" method="get">
            @csrf
            <div class="rounded-2" id="search_input_group">
                
                <input type="hidden" name="search_status" value="1">

                <div class="form-floating mb-3 mb-lg-0">

                    <select class="form-select" id="floor" name="floor" aria-label="{{__('Piso')}}">
                      <option value="">{{__('Cualquier piso')}}</option>

                      @for ($i=1; $i<26; $i++)
                        <option @if(old('floor')== $i) selected @endif value="{{$i}}">{{$i}}</option>
                      @endfor

                    </select>

                    <label for="floor">{{__('Piso')}}</label>
                </div>

                <div class="form-floating mb-3 mb-lg-0">
                    <select class="form-select" id="bedrooms" name="bedrooms" aria-label="{{__('Recámaras')}}">
                      <option value="">{{__('Cualquier cantidad')}}</option>
                      <option @if(old('bedrooms')==10) selected @endif value="10">{{__('Estudio')}}</option>
                      <option @if(old('bedrooms')==1) selected @endif value="1">1</option>
                      <option @if(old('bedrooms')==2) selected @endif value="2">2</option>
                      <option @if(old('bedrooms')==3) selected @endif value="3">3</option>
                    </select>
                    <label for="bedrooms">{{__('Recámaras')}}</label>
                </div>

                <div class="form-floating mb-3 mb-lg-0">
                    <select class="form-select" id="min_price" name="min_price" aria-label="{{__('Precio min.')}}">
                        <option value="">{{__('Sin mínimo')}}</option>
                        @php
                            $minPriceStart = 300000;
                            $maxPrice = 900000;
                        @endphp
                        @for($price = $minPriceStart; $price <= $maxPrice; $price += 100000)
                            <option @if(old('min_price')==$price) selected @endif value="{{ $price }}">${{ number_format($price / 1000) }}k</option>
                        @endfor
                    </select>
                    <label for="min_price">{{__('Precio min.')}}</label>
                </div>
                
                <div class="form-floating mb-3 mb-lg-0">
                    <select class="form-select" id="max_price" name="max_price" aria-label="{{__('Precio max.')}}">
                        <option value="">{{__('Sin máximo')}}</option>
                        @php
                            $maxPriceStart = 400000;
                            $maxPrice = 900000;
                        @endphp
                        @for($price = $maxPriceStart; $price <= $maxPrice; $price += 100000)
                            <option @if(old('max_price')==$price) selected @endif value="{{ $price }}">${{ number_format($price / 1000) }}k</option>
                        @endfor
                            <option @if(old('max_price')==1000000) selected @endif value="1000000">$1m</option>
                    </select>
                    <label for="max_price">{{__('Precio max.')}}</label>
                </div>
                

                <button type="submit" class="btn btn-blue rounded-end-2 col-12 col-lg-1" aria-label="{{__('Buscar')}}">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </form>
    </div>

</div>

<script>
    const form_inputs = document.getElementById('search_input_group');

    if(form_inputs){

    if (window.innerWidth <= 768) {
        // Código a ejecutar solo en dispositivos móviles (ancho menor o igual a 768px)
        form_inputs.classList.remove('input-group');
        form_inputs.classList.remove('shadow-4');
    }else{
        form_inputs.classList.add('input-group');
        form_inputs.classList.add('shadow-4');
    }

    }
</script>