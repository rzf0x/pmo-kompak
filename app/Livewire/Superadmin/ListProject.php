<?php

namespace App\Livewire\Superadmin;

use App\Models\Project;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ListProject extends Component
{

    protected $listeners = ['delete'];

    #[Layout('layouts.admin.app')]
    #[Title('Halaman List Project')]

    // Project Count
    public $rencana, $berlangsung, $selesai, $lunas, $batal, $tertunda;

    public $search;

    public function mount()
    {
        // Project Count
        $this->rencana = Project::where('category', 'rencana')->count();
        $this->berlangsung = Project::where('category', 'berlangsung')->count();
        $this->selesai = Project::where('category', 'selesai')->count();
        $this->lunas = Project::where('category', 'lunas')->count();
        $this->batal = Project::where('category', 'batal')->count();
        $this->tertunda = Project::where('category', 'tertunda')->count();
    }

    public function delete($id)
    {
        // Cari project berdasarkan ID dan hapus
        $project = Project::find($id);

        if ($project) {
            $project->delete();
            session()->flash('success', 'Project berhasil dihapus');
        } else {
            session()->flash('error', 'Project tidak ditemukan');
        }
    }

    public function search($query)
    {
        $this->search = $query;

        // Cari project berdasarkan nama
        $projects = Project::where('name', 'like', '%' . $query . '%')->get();
    }

    #[Computed]
    public function getData()
    {
        return Project::paginate(10);
    }

    public function render()
    {
        return view('livewire.superadmin.list-project');
    }
}
