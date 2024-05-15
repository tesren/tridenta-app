<?php

namespace App\Livewire;

use App\Models\Section;
use Livewire\Component;

class InventoryPage extends Component
{
    public function render()
    {
        $sections = Section::all();

        return view('livewire.pages.guest.inventory-page', compact('sections'))->layout('layouts.public-base');
    }
}
