<div>
    <x-detail-navbar-button :buttons="[
        [
            'route' => 'superadmin.detail-project',
            'class' => 'btn-primary',
            'icon' => '📊',
            'label' => 'Detail Project',
            'params' => ['id' => $project->id],
        ],
        [
            'route' => 'superadmin.project-task',
            'class' => 'btn-secondary',
            'icon' => '📝',
            'label' => 'Daftar Task',
            'params' => ['id' => $project->id],
            'badge' => $taskCount,
        ],
        [
            'route' => 'superadmin.project-pembayaran',
            'class' => 'btn-secondary',
            'icon' => '💰',
            'label' => 'Pembayaran',
            'params' => ['id' => $project->id],
        ],
        [
            'route' => 'superadmin.project-invoice',
            'class' => 'btn-secondary',
            'icon' => '🧾',
            'label' => 'List Invoice',
            'params' => ['id' => $project->id],
        ],
        [
            'route' => 'superadmin.project-dokumen',
            'class' => 'btn-secondary',
            'icon' => '📂',
            'label' => 'List Dokumen',
            'params' => ['id' => $project->id],
        ],
        [
            'route' => 'superadmin.project-langganan',
            'class' => 'btn-secondary',
            'icon' => '🔄',
            'label' => 'Langganan',
            'params' => ['id' => $project->id],
        ],
        [
            'route' => 'superadmin.list-project',
            'class' => 'btn-danger',
            'icon' => '🏠',
            'label' => 'Kembali',
        ],
    ]" />


    <div class="row">
        {{-- Detail Project --}}
        <div class="col-lg-6">
            <div class="card">
                <div class=" card-header bg-primary d-flex justify-content-between">
                    <h5 class="text-white">Detail Project</h5>
                    <a href="{{ route('superadmin.edit-project', ['id' => $project->id]) }}">
                        <button class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i> Edit
                        </button>
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th scope="row" class="text-muted" style="width: 30%;">Nama Project</th>
                                <td style="width: 5%;">:</td>
                                <td>{{ $project->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-muted">Deskripsi</th>
                                <td>:</td>
                                <td>{{ $project->description }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-muted">Client</th>
                                <td>:</td>
                                <td>{{ $project->customer->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-muted">Start Date</th>
                                <td>:</td>
                                <td>{{ $project->start_date }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-muted">End Date</th>
                                <td>:</td>
                                <td>{{ $project->end_date }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-muted">Status</th>
                                <td>:</td>
                                <td>
                                    @if ($project->category == 'rencana')
                                        <span class="badge bg-primary">Rencana</span>
                                    @elseif ($project->category == 'berlangsung')
                                        <span class="badge bg-warning">Berlangsung</span>
                                    @elseif ($project->category == 'selesai')
                                        <span class="badge bg-success">Selesai</span>
                                    @elseif ($project->category == 'lunas')
                                        <span class="badge bg-info">Lunas</span>
                                    @elseif ($project->category == 'batal')
                                        <span class="badge bg-danger">Batal</span>
                                    @elseif ($project->category == 'tertunda')
                                        <span class="badge bg-secondary">Tertunda</span>
                                    @else
                                        <span class="badge bg-dark">Unknown</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-muted">Created At</th>
                                <td>:</td>
                                <td>{{ $project->created_at }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-muted">Updated At</th>
                                <td>:</td>
                                <td>{{ $project->updated_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- End Detail Project --}}

        {{-- Revenue Project --}}
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="text-white card-title">Statistik Pendapatan</h4>
                </div>
                <div class="mt-4 card-body row">

                    <div class="col-lg-12">
                        <div class="card bg-primary">
                            <div class="text-white card-body ">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <small class="mb-0">Total Omset</small>
                                        <h3 class="mb-0 text-white">Rp. {{ number_format($omset, 0, ',', '.') }}
                                        </h3>
                                    </div>
                                    <div class="align-self">
                                        <i class="bi bi-wallet2"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card bg-success">
                            <div class="text-white card-body ">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <small class="mb-0">Total Pendapatan</small>
                                        <h3 class="mb-0 text-white">Rp.
                                            {{ $totalPemasukkan }}
                                        </h3>
                                    </div>
                                    <div class="align-self">
                                        <i class="bi bi-wallet2"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card bg-warning">
                            <div class="text-white card-body ">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <small class="mb-0">Total Piutang</small>
                                        <h3 class="mb-0 text-white">Rp. {{ $totalPiutang }}
                                        </h3>
                                    </div>
                                    <div class="align-self">
                                        <i class="bi bi-wallet2"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Revenue Project --}}
    </div>

</div>
