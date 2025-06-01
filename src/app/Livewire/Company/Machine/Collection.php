<?php

namespace App\Livewire\Company\Machine;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Collection extends Component
{
    #[Layout('components.layouts.company')]
    public function render()
    {
        return view('livewire.company.machine.collection');
    }
}
