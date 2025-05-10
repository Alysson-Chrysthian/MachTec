<?php

namespace App\Livewire\Company\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email, $password, $cnpj;

    public function rules()
    {
        return [
            'email' => ['required', 'email', 'exists:companies,email'],
            'password' => ['required', 'string', 'min:8', 'max:16'],
            'cnpj' => ['required', 'numeric', 'digits:14', 'exists:companies,cnpj']
        ];
    }

    public function login()
    {
        $this->validate();

        if (Auth::guard('company')->attempt([
            'email' => $this->email,
            'password' => $this->password,
            'cnpj' => $this->cnpj,
        ])) {
            $this->redirect(route('company.home'));
            return;
        }

        $this->addError('password', __('auth.failed'));
    }

    public function render()
    {
        return view('livewire.company.auth.login');
    }
}
