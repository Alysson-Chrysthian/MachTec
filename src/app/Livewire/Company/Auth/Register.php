<?php

namespace App\Livewire\Company\Auth;

use App\Models\Company;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
            'cnpj' => ['required', 'numeric', 'digits:14']
        ];
    }

    public function register()
    {
        $this->validate();

        $company = new Company;

        $company->name = $this->name;
        $company->email = $this->email;
        $company->password = Hash::make($this->password);
        $company->cnpj = $this->cnpj;

        $company->save();

        Auth::guard('company')->login($company);

        event(new Registered($company));

        $this->redirect(route('company.auth.login'));
    }

    public function render()
    {
        return view('livewire.company.auth.register');
    }
}
