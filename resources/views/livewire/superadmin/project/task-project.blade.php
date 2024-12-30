<div>
    <x-detail-navbar-button :buttons="[
        [
            'route' => 'superadmin.detail-project',
            'class' => 'btn-primary',
            'icon' => '📊',
            'label' => 'Detail Project',
            'params' => ['id' => $project],
        ],
        [
            'route' => 'superadmin.project-task',
            'class' => 'btn-secondary',
            'icon' => '📝',
            'label' => 'Daftar Task',
            'params' => ['id' => $project],
            'badge' => $taskCount,
        ],
        [
            'route' => 'superadmin.project-pembayaran',
            'class' => 'btn-secondary',
            'icon' => '💰',
            'label' => 'Pembayaran',
            'params' => ['id' => $project],
        ],
        [
            'route' => 'superadmin.project-invoice',
            'class' => 'btn-secondary',
            'icon' => '🧾',
            'label' => 'List Invoice',
            'params' => ['id' => $project],
        ],
        [
            'route' => 'superadmin.project-dokumen',
            'class' => 'btn-secondary',
            'icon' => '📂',
            'label' => 'List Dokumen',
            'params' => ['id' => $project],
        ],
        [
            'route' => 'superadmin.project-langganan',
            'class' => 'btn-secondary',
            'icon' => '🔄',
            'label' => 'Langganan',
            'params' => ['id' => $project],
        ],
        [
            'route' => 'superadmin.list-project',
            'class' => 'btn-danger',
            'icon' => '🏠',
            'label' => 'Kembali',
        ],
    ]" />

    <div class="row">
        {{-- To_do --}}
        <div class="col-lg-4 col-md-4 col-sm-6">
            <x-card-dashboard bgColor="bg-danger" icon="bi bi-info-circle" title="Rencana"
                subtitle="{{ $taskTodo }} Tugas" />
        </div>

        {{-- In_progress --}}
        <div class="col-lg-4 col-md-4 col-sm-6">
            <x-card-dashboard bgColor="bg-warning" icon="bi bi-arrow-repeat" title="Berlangsung"
                subtitle="{{ $taskProgress }} Tugas" />
        </div>

        {{-- Selesai --}}
        <div class="col-lg-4 col-md-4 col-sm-6">
            <x-card-dashboard bgColor="bg-success" icon="bi bi-check-circle-fill" title="Selesai"
                subtitle="{{ $taskDone }} Tugas" />
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-primary d-flex justify-content-between">
            <h5 class="text-white">Daftar tugas</h5>

            <a href="{{ route('superadmin.project-add-task', ['id' => $project->id]) }}">
                <button class="bg-white btn">
                    Tambah Tugas
                </button>
            </a>
        </div>
        <div class="mt-3 card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Task</th>
                            <th>Deskripsi</th>
                            <th>Nama staff</th>
                            <th>Due Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($this->tasks as $task)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $task->title }}</td>
                                <td class="w-25">{{ $task->description }}</td>
                                <td>
                                    {{ $task->user->name }}
                                </td>
                                <td>{{ $task->due_date }}</td>
                                <td>
                                    @if ($task->status == 'to_do')
                                        <span class="badge bg-danger">Belum di kerjakan</span>
                                    @elseif ($task->status == 'in_progress')
                                        <span class="badge bg-warning">Dalama proses</span>
                                    @else
                                        <span class="badge bg-success">Selesai</span>
                                    @endif
                                </td>
                                <td>
                                    {{-- Detail Info --}}
                                    {{-- <a href="" class="btn btn-sm btn-primary">
                                        <i class="bi bi-eye"></i>
                                        Detail
                                    </a> --}}

                                    {{-- Edit --}}
                                    <a href="{{ route('superadmin.edit-task', ['id' => $task->id]) }}"
                                        class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil"></i>
                                        Edit
                                    </a>

                                    {{-- Hapus --}}
                                    <button wire:click="deleteTask({{ $task->id }})" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i>
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
