<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;

class Company extends User implements MustVerifyEmail
{
    use Notifiable, HasFactory, Billable;

    protected $table = 'companies'; 
}
