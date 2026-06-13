<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CreditTransaction;

class BillingController extends Controller
{
    public function success(Request $request)
    {
        $credits = $request->query('credits');
        
        // In a real app, you would verify the Stripe session here before adding credits.
        // For development/mock purposes:
        if ($credits) {
            auth()->user()->increment('credits', $credits);
            
            CreditTransaction::create([
                'user_id' => auth()->id(),
                'amount' => $credits,
                'description' => 'Purchased credit package',
            ]);
            
            return redirect()->route('pricing')->with('success', "Successfully added {$credits} credits to your account!");
        }

        return redirect()->route('pricing')->with('error', 'Invalid transaction.');
    }
}
