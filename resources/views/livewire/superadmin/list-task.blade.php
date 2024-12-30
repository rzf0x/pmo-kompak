<div>
    <div class="card">
        <div class="card-header">
            <a href="{{ route('superadmin.create-task') }}">
                <button class="btn btn-primary">
                    Tambah Task
                </button>
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Tugas</th>
                        <th>Project</th>
                        <th>Deskripsi</th>
                        <th>status</th>
                        <th>Deadline</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($this->tasks as $task)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->project->name }}</td>
                            <td>{{ $task->description }}</td>
                            <td>
                                @if ($task->status == 'to_do')
                                    <span class="badge bg-danger">Belum Selesai</span>
                                @elseif ($task->status == 'in_progress')
                                    <span class="badge bg-warning">Dalam Progress</span>
                                @else
                                    <span class="badge bg-success">Selesai</span>
                                @endif
                            </td>
                            <td>{{ $task->due_date }}</td>
                            <td>
                                <a href="{{ route('superadmin.edit-task', ['id' => $task->id]) }}">
                                    <button class="btn btn-warning">Edit</button>
                                </a>
                                <button class="btn btn-danger"
                                    wire:click="deleteTask({{ $task->id }})">Delete</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">-- Tidak ada tugas --</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
