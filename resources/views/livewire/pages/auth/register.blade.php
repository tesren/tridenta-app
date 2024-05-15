<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Spatie\Honeypot\Http\Livewire\Concerns\HoneypotData;
use Spatie\Honeypot\Http\Livewire\Concerns\UsesSpamProtection;

new #[Layout('layouts.guest')] class extends Component
{
    use UsesSpamProtection;

    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $phone = '';
    public string $role = 'client';
    public string $lang = '';
    public string $password_confirmation = '';

    public HoneypotData $extraFields;
    
    public function mount()
    {
        $this->extraFields = new HoneypotData();
    }

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['nullable', 'string', 'max:10'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string', 'max:15'],
            'lang' => ['required', 'string', 'max:10'],
        ]);

        $this->protectAgainstSpam();

        $validated['password'] = Hash::make($validated['password']);

        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->phone = $validated['phone'];
        $user->password = $validated['password'];
        $user->role = $validated['role'];
        $user->lang = $validated['lang'];
        $user->save();

        event(new Registered( $user ));

        Auth::login($user);

        $this->redirect(RouteServiceProvider::HOME, navigate: true);
    }
}; ?>

@section('titles')
    <title>{{__('Regístrate')}} - Tridenta Towers </title>
    <meta name="description" content="{{__('Regístrate en Tridenta Towers y descubre un mundo de oportunidades en el paraíso de Puerto Vallarta. Con tu cuenta, accede a información detallada sobre nuestros condominios, guarda unidades de tu agrado, agenda citas para visitas personalizadas y más. ¡Únete a nuestra comunidad y comienza tu viaje hacia la vida costera de lujo en Tridenta Towers hoy mismo!')}}">
@endsection

<div class="grid justify-items-center">

    <div class="bg-white rounded-md px-6 py-4 mt-4 w-full lg:w-1/2">

        <h1 class="text-3xl font-bold">{{__('Crea tu cuenta')}}</h1>
        <p>{{__('Obten acceso a más características y funciones')}}</p>

        <form wire:submit="register" class="mt-4">
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Nombre')" />
                <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
    
            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Correo')" />
                <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <x-honeypot/>

            <!-- Phone -->
            <div class="mt-4">
                <x-input-label for="phone" :value="__('Teléfono')" />
                <x-text-input wire:model="phone" id="phone" class="block mt-1 w-full" type="tel" name="phone" autocomplete="phone" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            {{-- Lang --}}
            <div class="mt-4">
                <x-input-label for="lang" :value="__('Idioma de su preferencia')" />
                <select wire:model="lang" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="lang" id="lang" required>
                    <option value="">{{__('Seleccione')}}</option>
                    <option value="es">Español</option>
                    <option value="en">English</option>
                </select>
                <x-input-error :messages="$errors->get('lang')" class="mt-2" />
            </div>
    
            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
    
                <x-text-input wire:model="password" id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
    
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
    
            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
    
                <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />
    
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
    
            <div class="flex items-center justify-end mt-5">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}" wire:navigate>
                    {{ __('¿Ya tienes una cuenta?') }}
                </a>
    
                <x-primary-button class="ms-4">
                    {{ __('Registrarse') }}
                </x-primary-button>
            </div>
        </form>

        <div class="text-center px-4 my-3 text-yellow-400 text-xl" wire:loading>
            <i class="fa-solid fa-spin fa-spinner"></i> {{__('Creando su cuenta')}}
        </div>

    </div>

</div>
