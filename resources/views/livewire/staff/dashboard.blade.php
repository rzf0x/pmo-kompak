<div>
    <h5>Hallo {{ auth()->user()->name }} 👋</h5>
    <h6>Selamat datang di dashboard Project Manajemen Office Kompak Team Agency</h6>

    <div class="mt-4 row">
        {{-- Rencana --}}
        <div class="col-lg-4 col-12">
            <x-card-dashboard bgColor="bg-primary" icon="bi bi-pencil-fill" title="Rencana"
                subtitle="{{ $taskPlanned }} Tugas" />
        </div>

        {{-- Berlangsung --}}
        <div class="col-lg-4 col-12">
            <x-card-dashboard bgColor="bg-warning" icon="bi bi-clock-history" title="Berlangsung"
                subtitle="{{ $taskProgress }} Tugas" />
        </div>

        {{-- Selesai --}}
        <div class="col-lg-4 col-12">
            <x-card-dashboard bgColor="bg-success" icon="bi bi-check-circle-fill" title="Selesai"
                subtitle="{{ $taskDone }} Tugas" />
        </div>

        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white">Tugas Terbaru</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Tugas</th>
                                    <th>Project</th>
                                    <th>Deadline</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($this->tasks as $task)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $task->title }}</td>
                                        <td>{{ $task->project->name }}</td>
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

                                            <span class="{{ $class }}">
                                                {{ $task->due_date }}
                                            </span>


                                        </td>
                                        <td>
                                            @if ($task->status == 'to_do')
                                                <span class="badge bg-secondary">Todo</span>
                                            @elseif ($task->status == 'in_progress')
                                                <span class="badge bg-warning">Progress</span>
                                            @else
                                                <span class="badge bg-success">Selesai</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-primary">Detail</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <Small>*Petunjuk warna : </Small>
                        <small class="d-flex justify-content-between">
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
        </div>

        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header bg-success">
                    <h4 class="text-white">Project Terbaru</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Project</th>
                                    <th>Client</th>
                                    <th>Deadline</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($this->projects as $project)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $project->name }}</td>
                                        <td>{{ $project->customer->name }}</td>
                                        <td>{{ $project->end_date }}</td>
                                        <td>
                                            @if ($project->category == 'rencana')
                                                <span class="badge bg-secondary">{{ $project->category }}</span>
                                            @elseif ($project->category == 'berlangsung')
                                                <span class="badge bg-warning">{{ $project->category }}</span>
                                            @elseif ($project->category == 'selesai')
                                                <span class="badge bg-success">{{ $project->category }}</span>
                                            @elseif ($project->category == 'batal')
                                                <span class="badge bg-danger">{{ $project->category }}</span>
                                            @elseif ($project->category == 'lunas')
                                                <span class="badge bg-info">{{ $project->category }}</span>
                                            @else
                                                <span class="badge bg-primary">{{ $project->category }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
