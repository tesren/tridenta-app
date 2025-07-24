<?php

namespace App\Livewire;

use App\Models\Unit;
use Livewire\Component;
use App\Models\UnitType;
use App\Models\PaymentPlan;

class HomePage extends Component
{
    public function render()
    {

        $unit_types = UnitType::all();
        $payment_plans = PaymentPlan::all();
        $lowest_priced_unit = Unit::where('status', 'Disponible')->orderBy('price', 'asc')->first();


        return view('livewire.pages.guest.home-page', compact('unit_types', 'payment_plans', 'lowest_priced_unit'))->layout('layouts.public-base');
    }
}
