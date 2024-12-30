<?php

namespace App\Livewire\Superadmin;

use App\Models\Customer;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ListCustomer extends Component
{
    #[Layout('layouts.admin.app')]
    #[Title('Halaman List Project')]

    public function mount()
    {
        //
    }

    #[Computed]
    public function customers()
    {
        return Customer::paginate(10);
    }

    public function delete($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
    }

    public function render()
    {
        return view('livewire.superadmin.list-customer');
    }
}
