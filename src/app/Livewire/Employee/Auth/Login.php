<?php

namespace App\Livewire\Employee\Auth;

use Illuminate\Support\Facades\Auth;
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

        if (Auth::guard('employee')->attempt([
            'email' => $this->email,
            'password' => $this->password,
        ])) {
            $this->redirect(route('employee.home'));
            return;
        }
    
        $this->addError('password', __('auth.failed'));
    }

    public function render()
    {
        return view('livewire.employee.auth.login');
    }
}
