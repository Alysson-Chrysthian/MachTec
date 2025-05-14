<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    
    public function checkout($name, Request $request)
    {
        $plan = Plan::where('name', $name)->first();

        return $request->user()
            ->newSubscription('default', $plan->stripe_price_id)
            ->checkout([
                'success_url' => route('company.home'),
                'cancel_url' => route('billing'),
            ]);
    }

}
