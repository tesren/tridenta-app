<?php

namespace App\Livewire;

use App\Models\Unit;
use Livewire\Component;
use Livewire\WithPagination;

class SearchPage extends Component
{

    use WithPagination;

    public $search_status = 0;
    public $floor = 0;
    public $bedrooms = 0;
    public $min_price = 1;
    public $max_price = 9999999999;

    public function search(){

        $this->resetPage();
    }

    public function render()
    {
        
        $units = Unit::where('price', '>' ,$this->min_price)->where('price','<', $this->max_price)->where('status', '!=', 'Vendida');

        if( $this->floor != 0 ){
            $units = $units->where('floor', $this->floor);
        }

        if( $this->bedrooms != 0 ){

            $bedrooms = $this->bedrooms;

            switch($bedrooms){

                case 1:
                    $units = $units->where('unit_type_id', 20);
                break;

                case 2:
                    $units = $units->whereIn('unit_type_id', [17,18,19,25] );
                break;

                case 3:
                    $units = $units->whereIn('unit_type_id', [16,24] );
                break;

                case 10:
                    $units = $units->whereIn('unit_type_id', [21,22,23]);
                break;

            }
            
        }

        $units = $units->orderBy('price', 'asc')->paginate(15);

        
        return view('livewire.pages.guest.search-page', compact('units'))->layout('layouts.public-base');
    }
}