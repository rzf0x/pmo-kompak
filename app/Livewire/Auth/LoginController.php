<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class LoginController extends Component
{
    #[Layout('layouts.auth.app')]
    #[Title('Halaman Login')]

    public $email, $password;

    public function login()
    {
        $this->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            session()->flash('toast_success', 'Selamat datang di Dashboard');

            // Redirect berdasarkan role_id
            if ($user->role_id === 1) { // Super Admin
                return redirect()->route('superadmin.dashboard');
            } elseif ($user->role_id === 2) { // Admin
                return redirect()->route('admin.dashboard');
            } elseif ($user->role_id === 3) { // Staff
                return redirect()->route('staff.dashboard');
            } else {
                // Jika role tidak dikenali, bisa redirect ke halaman default atau error
                return redirect()->route('home')->with('error', 'Role tidak dikenali.');
            }
        }

        // Jika login gagal, redirect kembali ke halaman login dengan pesan error
        return redirect()->back()->withErrors(['email' => 'Email atau password salah.']);

        session()->flash('toast_error', 'No WhatsApp atau password yang anda masukkan salah');
    }

    public function render()
    {
        return view('livewire.auth.login-controller');
    }
}
