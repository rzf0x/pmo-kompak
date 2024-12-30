<?php

namespace App\Livewire\Staff;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;
use Livewire\Component;

class Profile extends Component
{
    use WithFileUploads;

    #[Title('Halaman Profil')]
    #[Layout('layouts.admin.app')]

    public $user, $name, $email, $no_whatsapp, $photo, $address, $password;
    public $photoPreview;

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'image|max:2048', // Validasi file gambar, maksimal 2MB
        ]);

        $this->photoPreview = $this->photo->temporaryUrl();
    }

    public function mount()
    {
        $this->user = Auth::user();

        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->no_whatsapp = $this->user->no_whatsapp;
        $this->photo = $this->user->photo;
        $this->address = $this->user->address;
    }

    public function updateProfile()
    {
        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
            'no_whatsapp' => $this->no_whatsapp,
            'address' => $this->address,
            'photo' => $this->photo,
            'password' => $this->password,
        ]);

        session()->flash('success', 'Profil berhasil diperbarui');
        return redirect()->route('staff.profile');
    }

    public function render()
    {
        return view('livewire.staff.profile');
    }
}
