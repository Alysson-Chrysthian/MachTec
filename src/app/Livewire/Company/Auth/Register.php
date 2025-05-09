<?php

namespace App\Livewire\Company\Auth;

use Livewire\Component;

class Register extends Component
{
    public $name, $email, $password, $password_confirmation, $cnpj;

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:30'],
            'email' => ['required', 'email', 'unique:companies,email'],
            'password' => ['required', 'string', 'min:8', 'max:16', 'confirmed'],
            'cnpj' => ['required', 'digits:14', 'numeric']
        ];
    }

    public function register()
    {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.company.auth.register');
    }
}
