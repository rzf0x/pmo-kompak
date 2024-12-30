<?php

namespace App\Livewire\Superadmin;

use App\Models\Payment;
use App\Models\Project;
use App\Models\Revenue;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class DetailProject extends Component
{
    #[Layout('layouts.admin.app')]
    #[Title('Detail Project')]

    public $project;

    public $omset, $pemasukkan, $piutang, $taskCount, $totalPemasukkan, $totalPiutang, $revenue, $payment;

    public function mount($id)
    {
        $this->project = Project::find($id);

        // Menggunakan selectRaw untuk menghitung omset, pemasukkan, dan piutang sekaligus
        $revenue = Revenue::selectRaw('
                SUM(amount) as omset')
            ->where('project_id', $this->project->id)
            ->first();

        // Menyimpan hasil query ke dalam properti
        $this->omset = $revenue->omset ?? 0;

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

        // Menghitung jumlah task untuk proyek
        $this->taskCount = $this->project->tasks()->count();
    }

    #[Computed]
    public function tasks()
    {
        return $this->project->tasks()->get();
    }

    public function render()
    {
        return view('livewire.superadmin.detail-project');
    }
}
