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
        
        $units = Unit::where('price', '>' ,$this->min_price)->where('price','<', $this->max_price);

        if( $this->floor != 0 ){
            $units = $units->where('floor', $this->floor);
        }

        if( $this->bedrooms != 0 ){

            $bedrooms = $this->bedrooms;

            switch($bedrooms){

                case 1:
                    $units = $units->where('unit_type_id', 1,2);
                break;

                case 2:
                    $units = $units->whereIn('unit_type_id', [3,4,5,6,7,8] );
                break;

                case 3:
                    $units = $units->whereIn('unit_type_id', [9,10] );
                break;

                case 10:
                    $units = $units->where('unit_type_id', 11);
                break;

            }
            
        }

        $units = $units->paginate(10);

        
        return view('livewire.pages.guest.search-page', compact('units'))->layout('layouts.public-base');
    }
}