<?php

namespace App\Livewire\Company\Machine;

use App\Models\CompanyMachine;
use App\Models\Machine;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    public $search;

    public function selectMachine(Machine $machine)
    {
        $companyMachine = new CompanyMachine;

        $companyMachine->company_id = Auth::guard('company')->id();
        $companyMachine->machine_id = $machine->id;

        $companyMachine->save();

        $this->dispatch('machine-selected');
    }

    #[Layout('components.layouts.company')]
    public function render()
    {
        $machines = Machine::with('selected')
            ->where(
                'name', 
                'like', 
                '%' . $this->search . '%'
            )->get();

        return view('livewire.company.machine.index', [
            'machines' => $machines,
        ]);
    }
}
