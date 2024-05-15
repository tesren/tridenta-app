<?php

namespace App\Livewire;

use App\Models\Unit;
use Livewire\Component;

class UnitPage extends Component
{
    public Unit $unit;

    public function mount($name)
    {
        $this->reset();
        $this->unit = Unit::where('name', $name)->firstOrFail();
        $this->dispatch('nombre-unidad', name:$name);
    }

    public function render()
    {
        return view('livewire.pages.guest.unit-page')->layout('layouts.public-base');
    }


}
