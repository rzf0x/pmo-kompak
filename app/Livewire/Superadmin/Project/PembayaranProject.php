<?php

namespace App\Livewire\Superadmin\Project;

use App\Models\Payment;
use App\Models\Project;
use App\Models\Revenue;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class PembayaranProject extends Component
{
    #[Title('Halaman Pembayaran Project')]
    #[Layout('layouts.admin.app')]

    public $project, $taskCount, $totalProject, $totalPemasukkan, $totalPiutang, $revenue, $payment;

    public function mount($id)
    {
        // Ambil project berdasarkan ID
        $this->project = Project::find($id);

        // Ambil revenue yang pertama berdasarkan project_id (asumsi hanya ada satu revenue per project)
        $this->revenue = Revenue::where('project_id', $this->project->id)->first(); // Gunakan first() untuk mendapatkan satu objek

        // Ambil pembayaran berdasarkan revenue_id
        $this->payment = Payment::where('revenue_id', $this->revenue->id)->get();

        // Menghitung total pemasukkan
        $this->totalPemasukkan = $this->payment->sum('amount_paid');

        // Menghitung total piutang
        $this->totalPiutang = $this->revenue->amount - $this->totalPemasukkan;

        // Format total pemasukkan dan total piutang dengan number_format
        $this->totalPemasukkan = number_format($this->totalPemasukkan, 0, ',', '.');
        $this->totalPiutang = number_format($this->totalPiutang, 0, ',', '.');

        $this->taskCount = $this->project->tasks()->count();

        $this->totalProject = number_format(Revenue::where('project_id', $this->project->id)->sum('amount'), 0, ',', '.');
    }

    public function delete($id)
    {
        Payment::find($id)->delete();

        return redirect()->route('superadmin.project-pembayaran', ['id' => $this->project->id]);
    }

    public function render()
    {
        return view('livewire.superadmin.project.pembayaran-project');
    }
}
