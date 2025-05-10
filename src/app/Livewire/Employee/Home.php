<?php

namespace App\Livewire\Employee;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Home extends Component
{
    #[Layout('components.layouts.employee')]
    public function render()
    {
        return view('livewire.employee.home');
    }
}
