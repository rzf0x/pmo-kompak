<?php

namespace App\Livewire\Superadmin;

use App\Models\Customer;
use App\Models\Project;
use App\Models\Revenue;
use App\Models\Task;
use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    #[Layout('layouts.admin.app')]
    #[Title('Dashboard Super Admin')]

    // Project Count
    public $rencana, $berlangsung, $selesai, $lunas, $batal, $tertunda;

    // Revenue
    public $omset, $pemasukkan, $piutang;

    // Staff, admin & customer count
    public $staff, $admin, $customer;

    public function mount()
    {
        // Project Count
        $this->rencana = Project::where('category', 'rencana')->count();
        $this->berlangsung = Project::where('category', 'berlangsung')->count();
        $this->selesai = Project::where('category', 'selesai')->count();
        $this->lunas = Project::where('category', 'lunas')->count();
        $this->batal = Project::where('category', 'batal')->count();
        $this->tertunda = Project::where('category', 'tertunda')->count();

        $this->omset = Revenue::sum('amount');
        // $this->pemasukkan = Revenue::sum('total_income');
        // $this->piutang = Revenue::sum('remaining');

        // Staff & Admin Count
        $this->staff = User::where('role_id', 3)->count();
        $this->admin = User::where('role_id', 2)->count();
        $this->customer = Customer::count();
    }

    #[Computed]
    public function getDataTask()
    {
        return Task::take(5)->get();
    }

    public function render()
    {
        return view('livewire.superadmin.dashboard');
    }
}
