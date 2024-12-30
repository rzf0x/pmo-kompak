<?php

namespace App\Livewire\Superadmin;

use App\Models\Invoice;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ListInvoice extends Component
{
    #[Title('Halaman List Invoice')]
    #[Layout('layouts.admin.app')]

    public function mount()
    {
        // 
    }

    #[Computed]
    public function invoices()
    {
        return Invoice::all();
    }

    public function render()
    {
        return view('livewire.superadmin.list-invoice');
    }
}
