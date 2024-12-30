<?php

namespace App\Livewire\Superadmin\Customer;

use App\Models\Customer;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class EditCustomer extends Component
{
    #[Title('Edit Customer')]
    #[Layout('layouts.admin.app')]

    // Object
    public $customer;

    // String
    public $name, $email, $phone, $address;

    public function mount($id)
    {
        $this->customer = Customer::find($id);

        // data customer
        $this->name = $this->customer->name;
        $this->email = $this->customer->email;
        $this->phone = $this->customer->phone;
        $this->address = $this->customer->address;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers,email,' . $this->customer->id,
            'phone' => 'required',
            'address' => 'required',
        ]);

        $this->customer->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
        ]);

        session()->flash('success', 'Customer berhasil diupdate');
        return redirect()->route('superadmin.list-customer');
    }

    public function render()
    {
        return view('livewire.superadmin.customer.edit-customer');
    }
}
