<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Machine extends Model
{
 
    public function selected() : HasMany
    {
        return $this->hasMany(CompanyMachine::class, 'machine_id', 'id')->where('company_id', Auth::guard('company')->id()); 
    }

}
