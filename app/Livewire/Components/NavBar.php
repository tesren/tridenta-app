<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\App;

class NavBar extends Component
{

    public $unit_name = '1';
    public $contact = '';

    #[On('nombre-unidad')] 
    public function updateUnit($name)
    {
        $this->unit_name = $name;
    }

    public function mount()
    {
        $this->contact = request()->query('contact');
    }

    public function changeLang(){

        if ( app()->getLocale() == 'en' ) {
            
            App::setLocale('es');

        } else {

            App::setLocale('en');

        }
        
    }

    public function render()
    {
        return view('components.nav-bar');
    }
}
