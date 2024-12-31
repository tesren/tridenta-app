<?php

namespace App\Livewire;

use App\Models\Section;
use Livewire\Component;
use Illuminate\Support\Facades\Route;

class InventoryBay extends Component
{

    public $route='';

    public function mount()
    {
        $this->route = Route::currentRouteName();
    }

    public function render()
    {
        $sections = Section::where('name', 'Vista Bahía')->get();
        $img_view_path = '/img/inventory-bahia.webp';

        return view('livewire.pages.guest.inventory', compact('sections', 'img_view_path'))->layout('layouts.public-base');
    }
}
