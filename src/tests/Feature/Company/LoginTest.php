<?php

namespace Tests\Feature\Company;

use App\Livewire\Company\Auth\Login;
use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_render()
    {
        Livewire::test(Login::class)
            ->assertStatus(200);
    }

    public function test_is_redirecting_to_emaiL_verification()
    {
        $company = Company::factory()
            ->unverified()
            ->create();

        Livewire::test(Login::class)
            ->set('email', $company->email)
            ->set('cnpj', $company->cnpj)
            ->set('password', 'password')
            ->call('login')
            ->assertRedirectToRoute('verification.notice');    

        $this->assertTrue(Auth::guard('company')->check());
    }

    public function test_is_redirecting_to_home_when_already_verified()
    {
        $company = Company::factory()->create();

        Livewire::test(Login::class)
            ->set('email', $company->email)
            ->set('cnpj', $company->cnpj)
            ->set('password', 'password')
            ->call('login')
            ->assertRedirectToRoute('company.home');

        $this->assertTrue(Auth::guard('company')->check());
    }

}
