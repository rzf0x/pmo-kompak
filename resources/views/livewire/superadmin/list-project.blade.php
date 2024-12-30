<div>
    <div class="row">
        {{-- Rencana --}}
        <div class="col-lg-2 col-md-4 col-sm-6">
            <x-card-dashboard bgColor="bg-primary" icon="bi bi-circle-fill" title="Rencana"
                subtitle="{{ $rencana }}" />
        </div>

        {{-- Berlangsung --}}
        <div class="col-lg-2 col-md-4 col-sm-6">
            <x-card-dashboard bgColor="bg-warning" icon="bi bi-arrow-repeat" title="Berlangsung"
                subtitle="{{ $berlangsung }}" />
        </div>

        {{-- Selesai --}}
        <div class="col-lg-2 col-md-4 col-sm-6">
            <x-card-dashboard bgColor="bg-success" icon="bi bi-check-circle-fill" title="Selesai"
                subtitle="{{ $selesai }}" />
        </div>

        {{-- Lunas --}}
        <div class="col-lg-2 col-md-4 col-sm-6">
            <x-card-dashboard bgColor="bg-info" icon="bi bi-wallet2" title="Lunas" subtitle="{{ $lunas }}" />
        </div>

        {{-- Batal --}}
        <div class="col-lg-2 col-md-4 col-sm-6">
            <x-card-dashboard bgColor="bg-danger" icon="bi bi-x-circle-fill" title="Batal"
                subtitle="{{ $batal }}" />
        </div>

        {{-- Tertunda --}}
        <div class="col-lg-2 col-md-4 col-sm-6">
            <x-card-dashboard bgColor="bg-secondary" icon="bi bi-clock-fill" title="Tertunda"
                subtitle="{{ $tertunda }}" />
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('superadmin.create-project') }}" class="btn btn-primary">Tambah Project</a>
                </div>
                <div class="gap-2 col-md-6 d-flex justify-content-end">
                    <input type="text" class="form-control" placeholder="Search" wire:model="search">
                    <button class="btn btn-primary" wire:click="search">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>

            <table class="table mt-3 table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Project Name</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Customer</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($this->getData as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                @foreach ($item->revenues as $revenue)
                                    Rp{{ number_format($revenue->amount, 2, ',', '.') }}<br>
                                @endforeach
                            </td>
                            <td>
                                @if ($item->category == 'rencana')
                                    <span class="badge bg-primary">Rencana</span>
                                @elseif ($item->category == 'berlangsung')
                                    <span class="badge bg-warning">Berlangsung</span>
                                @elseif ($item->category == 'selesai')
                                    <span class="badge bg-success">Selesai</span>
                                @elseif ($item->category == 'lunas')
                                    <span class="badge bg-info">Lunas</span>
                                @elseif ($item->category == 'batal')
                                    <span class="badge bg-danger">Batal</span>
                                @elseif ($item->category == 'tertunda')
                                    <span class="badge bg-secondary">Tertunda</span>
                                @else
                                    <span class="badge bg-dark">Unknown</span>
                                @endif
                            </td>
                            <td>{{ $item->customer->name }}</td>
                            <td>{{ $item->start_date }}</td>
                            <td>{{ $item->end_date }}</td>
                            <td>
                                {{-- Detail Project --}}
                                <a href="{{ route('superadmin.detail-project', ['id' => $item->id]) }}"
                                    class="btn btn-info btn-sm">
                                    <i class="bi bi-eye"></i> Detail
                                </a>
                                {{-- Edit Project --}}
                                <a href="{{ route('superadmin.edit-project', ['id' => $item->id]) }}"
                                    class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                {{-- Delete Project --}}
                                <button onclick="confirmDelete('{{ $item->id }}')" type="button"
                                    class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Delete
                                </button>

                                {{-- Button Task --}}
                                <a href="{{ route('superadmin.project-task', ['id' => $item->id]) }}"
                                    class="btn btn-primary btn-sm">
                                    <i class="bi bi-card-checklist"></i> Task
                                </a>

                                <script>
                                    function confirmDelete(id) {
                                        Swal.fire({
                                            title: 'Apakah Anda yakin?',
                                            text: "Data ini akan dihapus!",
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#d33',
                                            cancelButtonColor: '#3085d6',
                                            confirmButtonText: 'Ya, hapus!',
                                            cancelButtonText: 'Batal'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                @this.delete(id);
                                                Swal.fire(
                                                    'Dihapus!',
                                                    'Data telah dihapus.',
                                                    'success'
                                                );
                                            }
                                        });
                                    }
                                </script>

                                <script>
                                    function showAlert() {
                                        // Menunggu Livewire untuk menyelesaikan aksi
                                        Livewire.on('actionCompleted', (message) => {
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Berhasil!',
                                                text: message,
                                                confirmButtonText: 'OK'
                                            });
                                        });
                                    }
                                </script>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">-- Data tidak ada --</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
