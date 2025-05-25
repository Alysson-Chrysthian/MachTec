<?php

namespace App\Livewire\Employee\Machine;

use App\Models\Machine;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $images = [];
    public $name;

    public function rules()
    {
        return [
            'name' => ['required', 'min:3', 'max:20'],
            'images.*' => ['required', 'image'],
        ];
    }

    public function create()
    {
        $this->validate();

        $images_path = [];

        foreach ($this->images as $image) {
            array_push($images_path, $image->store());
        }

        $machine = new Machine;
    
        $machine->name = $this->name;
        $machine->images = json_encode($images_path);

        $machine->save();

        $this->dispatch('machine-created');
        $this->reset(['name', 'images']);
    }

    #[Layout('components.layouts.employee')]
    public function render()
    {
        return view('livewire.employee.machine.create');
    }
}
