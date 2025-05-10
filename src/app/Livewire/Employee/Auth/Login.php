<?php

namespace App\Livewire\Employee\Auth;

use Livewire\Component;

class Login extends Component
{
    public $email, $password;

    public function rules()
    {
        return [
            'email' => ['required', 'email', 'exists:employees,email'],
            'password' => ['required', 'string', 'min:8', 'max:16'],
        ];
    }

    public function login()
    {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.employee.auth.login');
    }
}
