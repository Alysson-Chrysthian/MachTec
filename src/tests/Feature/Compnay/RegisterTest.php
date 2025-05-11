<?php

namespace Tests\Feature\Compnay;

use App\Livewire\Company\Auth\Register;
use App\Models\Company;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Notification;
use Livewire\Livewire;
use Nette\Utils\Random;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp() : void 
    {
        parent::setUp();

        Event::fake([Registered::class]);
        Notification::fake();
    }

    public function test_can_render()
    {
        Livewire::test(Register::class)
            ->assertStatus(200);
    }

    public function test_can_register()
    {
        Livewire::test(Register::class)
            ->set('name', fake()->name())
            ->set('email', fake()->email())
            ->set('password', 'password')
            ->set('password_confirmation', 'password')
            ->set('cnpj', Random::generate(14, '0-9'))
            ->call('register');

        $this->assertCount(1, Company::all());
        $this->assertNull(Company::first()->email_verified_at);
        $this->assertTrue(Auth::guard('company')->check());
        Event::assertDispatched(Registered::class);
    }

}
