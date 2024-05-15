<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\App;

class NavBar extends Component
{

    public $unit_name = '1';

    #[On('nombre-unidad')] 
    public function updateUnit($name)
    {
        $this->unit_name = $name;
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
