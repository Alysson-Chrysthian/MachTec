<?php

namespace App\Livewire\Company\Machine;

use App\Models\Machine;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    public $search;

    #[Layout('components.layouts.company')]
    public function render()
    {
        $machines = Machine::where(
            'name', 
            'like', 
            '%' . $this->search . '%'
        )->get();

        return view('livewire.company.machine.index', [
            'machines' => $machines,
        ]);
    }
}
