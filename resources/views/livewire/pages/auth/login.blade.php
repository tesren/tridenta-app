<?php

use App\Livewire\Forms\LoginForm;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: RouteServiceProvider::DASHBHOME, navigate: true);
    }
}; ?>

<div class="grid grid-cols-1 lg:grid-cols-2">

    <img class="w-full inline-block" src="{{asset('img/tridenta-login.webp')}}" alt="Tridenta Towers">

    <div class="w-full px-8 py-4 self-center">
        <!-- Session Status -->
        <h1 class="text-3xl font-bold">{{__('Inicia Sesión')}}</h1>
        <div class="mb-5">{{__('Entra a tu cuenta')}}</div>
    
        <x-auth-session-status class="mb-4" :status="session('status')" />
    
        <form wire:submit="login">
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full" type="email" name="email" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
            </div>
    
            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
    
                <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
    
                <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
            </div>
    
            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember" class="inline-flex items-center">
                    <input wire:model="form.remember" id="remember" type="checkbox" class="rounded border-gray-300 text-sky-800 shadow-sm focus:ring-sky-800" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
    
            <div class="items-center justify-end mt-4">
                <x-primary-button class="block w-full mb-2">
                    {{ __('Entrar') }}
                </x-primary-button>
    
                @if (Route::has('password.request'))
                    <a class="block text-center underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}" wire:navigate>
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                @endif
            </div>
        </form>
    </div>

</div>