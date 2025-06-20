<?php

namespace App\Livewire;

use App\Models\Section;
use Livewire\Component;
use Illuminate\Support\Facades\Route;

class InventorySierra extends Component
{

    public $route='';

    public function mount()
    {
        $this->route = Route::currentRouteName();
    }

    
    public function render()
    {
        $sections = Section::where('name', 'Vista Sierra')->get();
        $img_view_path = '/img/vista-sierra-nuevo.webp';
        
        return view('livewire.pages.guest.inventory', compact('sections', 'img_view_path') )->layout('layouts.public-base');
    }
}
