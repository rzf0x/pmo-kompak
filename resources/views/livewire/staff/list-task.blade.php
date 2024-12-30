<div>

    <div class="mt-4 row">
        {{-- Rencana --}}
        <div class="col-lg-4 col-md-4 col-12">
            <x-card-dashboard bgColor="bg-primary" icon="bi bi-pencil-fill" title="Rencana"
                subtitle="{{ $taskPlanned }} Tugas" />
        </div>

        {{-- Berlangsung --}}
        <div class="col-lg-4 col-md-4 col-12">
            <x-card-dashboard bgColor="bg-warning" icon="bi bi-clock-history" title="Berlangsung"
                subtitle="{{ $taskProgress }} Tugas" />
        </div>

        {{-- Selesai --}}
        <div class="col-lg-4 col-md-4 col-12">
            <x-card-dashboard bgColor="bg-success" icon="bi bi-check-circle-fill" title="Selesai"
                subtitle="{{ $taskDone }} Tugas" />
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-primary">
            <h5 class="text-white">Daftar Task</h5>
        </div>
        <div class="mt-3 card-body">
            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Task</th>
                        <th>Deadline</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($this->tasks as $task)
                        <tr>
                            <td class="text-sm">{{ $loop->iteration }}</td>
                            <td class="text-sm">{{ $task->title }}</td>
                            <td>
                                @php
                                    $dueDate = \Carbon\Carbon::parse($task->due_date);
                                    $daysUntilDue = now()->diffInDays($dueDate, false); // Hitung selisih hari
                                    $class = 'btn btn-success'; // Default warna hijau

                                    if ($daysUntilDue <= 2 && $daysUntilDue >= 0) {
                                        $class = 'btn btn-danger'; // Merah untuk <= 2 hari
                                    } elseif ($daysUntilDue <= 4 && $daysUntilDue > 2) {
                                        $class = 'btn btn-warning'; // Kuning untuk 3-4 hari
                                    }
                                @endphp

                                <span class="{{ $class }} text-sm">
                                    {{ $task->due_date }}
                                </span>
                            </td>
                            <td class="text-center">
                                @if ($task->status == 'to_do')
                                    <span class="badge bg-secondary">Todo</span>
                                @elseif ($task->status == 'in_progress')
                                    <span class="badge bg-warning">Progress</span>
                                @else
                                    <span class="badge bg-success">Selesai</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('staff.edit-task', ['id' => $task->id]) }}">
                                    <button class="btn btn-primary">
                                        Detail
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <Small>*Petunjuk warna : </Small>
            <small class="flex-wrap d-flex justify-content-between">
                <div>
                    <span class="text-danger">Merah:</span> Deadline ≤ 2 hari
                </div>
                <div>
                    <span class="text-warning">Kuning:</span> Deadline ≤ 4 hari
                </div>
                <div>
                    <span class="text-success">Hijau:</span> Deadline > 4 hari
                </div>
            </small>
        </div>
    </div>
</div>
