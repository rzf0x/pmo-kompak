<?php

namespace App\Livewire\Superadmin\Customer;

use App\Models\Customer;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreateCustomer extends Component
{
    #[Title('Halaman Tambah Customer')]
    #[Layout('layouts.admin.app')]

    public $name, $email, $phone, $address;

    public function store()
    {
        // Validate Data
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required',
            'address' => 'required',
        ]);

        // Store Data
        Customer::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
        ]);

        return redirect()->route('superadmin.list-customer');
    }

    public function render()
    {
        return view('livewire.superadmin.customer.create-customer');
    }
}
