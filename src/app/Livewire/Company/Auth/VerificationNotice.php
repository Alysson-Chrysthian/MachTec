<?php

namespace App\Livewire\Company\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class VerificationNotice extends Component
{
    public function resend()
    {
        $company = Auth::guard('company')->user();
        $company->sendEmailVerificationNotification();
    }

    public function render()
    {
        return view('livewire.company.auth.verification-notice');
    }
}
