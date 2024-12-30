<?php

namespace App\Livewire\Superadmin;

use App\Models\Payment;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ListPembayaran extends Component
{

    #[Title('Halaman List Pembayaran')]
    #[Layout('layouts.admin.app')]

    public $paymentPending, $paymentSuccess, $paymentFailed, $paymentCicilan, $paymentTransfer;

    public $paymentProof;

    public function mount()
    {
        $this->paymentPending = Payment::where('payment_status', 'pending')->count();
        $this->paymentSuccess = Payment::where('payment_status', 'success')->count();
        $this->paymentFailed = Payment::where('payment_status', 'failed')->count();
        $this->paymentCicilan = Payment::where('payment_type', 'cicilan')->count();
        $this->paymentTransfer = Payment::where('payment_type', 'transfer')->count();
    }

    public function showPaymentProof($paymentId)
    {
        $payment = Payment::find($paymentId);
        $this->paymentProof = $payment->payment_proof;
    }

    #[Computed]
    public function payments()
    {
        return Payment::latest()->get();
    }

    public function render()
    {
        return view('livewire.superadmin.list-pembayaran');
    }
}
