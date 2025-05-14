<?php

namespace App\Livewire\Company;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Home extends Component
{
    #[Layout('components.layouts.company')]
    public function render()
    {
        return view('livewire.company.home');
    }
}
