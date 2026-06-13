<?php

namespace App\Livewire;

use Livewire\Component;

class Pricing extends Component
{
    public function checkout($amount, $credits)
    {
        // In a real production environment, you would use Cashier like this:
        // return auth()->user()->checkout(['price_id_for_'.$credits => 1], [
        //     'success_url' => route('billing.success', ['credits' => $credits]),
        //     'cancel_url' => route('pricing'),
        // ]);

        // Since we are in testing/development without real Stripe keys configured yet:
        if (!env('STRIPE_SECRET')) {
            // Simulate successful purchase immediately
            return redirect()->route('billing.success', ['credits' => $credits]);
        }

        // Add real checkout here when keys are ready
        session()->flash('error', 'Stripe is not fully configured yet.');
    }

    public function render()
    {
        return view('livewire.pricing')->layout('layouts.app');
    }
}
