<?php

namespace App\Livewire\Superadmin\Staff;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreateStaff extends Component
{
    #[Title('Halaman Tambah Staff')]
    #[Layout('layouts.admin.app')]

    public $name, $email, $password;

    public function store()
    {
        // Validate
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        // Store
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role_id' => 3,
        ]);

        return redirect()->route('superadmin.list-staff');
    }

    public function render()
    {
        return view('livewire.superadmin.staff.create-staff');
    }
}
