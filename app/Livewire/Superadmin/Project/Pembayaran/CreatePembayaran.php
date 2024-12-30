<?php

namespace App\Livewire\Superadmin\Project\Pembayaran;

use App\Models\Payment;
use App\Models\Project;
use App\Models\Revenue;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreatePembayaran extends Component
{
    #[Title('Halaman Tambah Pembayaran')]
    #[Layout('layouts.admin.app')]

    public $project, $revenue;

    public $payment_name, $payment_type, $amount_paid, $payment_date;

    public function mount($id)
    {
        $this->project = $id;
        $this->revenue = Revenue::where('project_id', $this->project)->first();
    }

    public function store()
    {
        $this->validate([
            'payment_name' => 'required',
            'payment_type' => 'required',
            'amount_paid' => 'required|numeric',
            'payment_date' => 'required|date',
        ]);

        Payment::create([
            'payment_name' => $this->payment_name,
            'payment_type' => $this->payment_type,
            'amount_paid' => $this->amount_paid,
            'payment_date' => $this->payment_date,
            'revenue_id' => $this->revenue->id,
        ]);

        session()->flash('success', 'Pembayaran berhasil ditambahkan.');

        return redirect()->route('superadmin.project-pembayaran', ['id' => $this->project]);
    }

    public function render()
    {
        return view('livewire.superadmin.project.pembayaran.create-pembayaran');
    }
}
