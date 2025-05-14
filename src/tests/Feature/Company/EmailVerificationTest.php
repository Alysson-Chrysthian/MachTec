<?php

namespace Tests\Feature\Company;

use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\Fakers\EmailVerificationNotification;
use Tests\TestCase;

class EmailVerificationTest extends TestCase
{
    use RefreshDatabase;

    private $company;

    protected function setUp(): void
    {
        parent::setUp();

        $this->company = Company::factory()
            ->unverified()
            ->create();
    
        Auth::guard('company')->login($this->company);
    }

    public function test_can_verify_email()
    {
        $notification = new EmailVerificationNotification;
        $uri = $notification->verificationUrl($this->company);
        
        $this->actingAs($this->company)->get($uri);
        $this->assertNotNull($this->company->email_verified_at);
    }



}
