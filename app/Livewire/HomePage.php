<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\UnitType;
use App\Models\PaymentPlan;

class HomePage extends Component
{
    public function render()
    {

        $unit_types = UnitType::all();
        $payment_plans = PaymentPlan::all();

        return view('livewire.pages.guest.home-page', compact('unit_types', 'payment_plans'))->layout('layouts.public-base');
    }
}
