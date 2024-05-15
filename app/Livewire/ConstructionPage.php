<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ConstructionUpdate;

class ConstructionPage extends Component
{
    use WithPagination;


    public function render()
    {
        $const_updates = ConstructionUpdate::orderByDesc('date')->paginate(5);

        return view('livewire.pages.guest.construction-page', compact('const_updates'))->layout('layouts.public-base');
    }
}
