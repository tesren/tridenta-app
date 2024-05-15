<?php

namespace App\Livewire;

use Livewire\Component;

class PrivacyPolicyPage extends Component
{
    public function render()
    {
        return view('livewire.pages.guest.privacy-policy-page')->layout('layouts.public-base');
    }
}
