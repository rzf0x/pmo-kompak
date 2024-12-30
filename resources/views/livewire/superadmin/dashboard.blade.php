<div>

    <h5>Hai Superadmin 👋</h5>
    <h6>Selamat datang di dashboard Superadmin</h6>

    <div class="mt-4 row">
        {{-- Rencana --}}
        <div class="col-lg-2 col-md-4 col-sm-6">
            <x-card-dashboard bgColor="bg-primary" icon="bi bi-circle-fill" title="Rencana"
                subtitle="{{ $rencana }} Project" />
        </div>

        {{-- Berlangsung --}}
        <div class="col-lg-2 col-md-4 col-sm-6">
            <x-card-dashboard bgColor="bg-warning" icon="bi bi-arrow-repeat" title="Berlangsung"
                subtitle="{{ $berlangsung }} Project" />
        </div>

        {{-- Selesai --}}
        <div class="col-lg-2 col-md-4 col-sm-6">
            <x-card-dashboard bgColor="bg-success" icon="bi bi-check-circle-fill" title="Selesai"
                subtitle="{{ $selesai }} Project" />
        </div>

        {{-- Lunas --}}
        <div class="col-lg-2 col-md-4 col-sm-6">
            <x-card-dashboard bgColor="bg-info" icon="bi bi-wallet2" title="Lunas"
                subtitle="{{ $lunas }} Project" />
        </div>

        {{-- Batal --}}
        <div class="col-lg-2 col-md-4 col-sm-6">
            <x-card-dashboard bgColor="bg-danger" icon="bi bi-x-circle-fill" title="Batal"
                subtitle="{{ $batal }} Project" />
        </div>

        {{-- Tertunda --}}
        <div class="col-lg-2 col-md-4 col-sm-6">
            <x-card-dashboard bgColor="bg-secondary" icon="bi bi-clock-fill" title="Tertunda"
                subtitle="{{ $tertunda }} Project" />
        </div>

        {{-- Total Staff --}}
        <div class="col-lg-4 col-md-6">
            <x-card-dashboard bgColor="bg-info" icon="bi bi-people-fill" title="Total Staff"
                subtitle="{{ $staff }} orang" />
        </div>

        {{-- Total Admin --}}
        <div class="col-lg-4 col-md-6">
            <x-card-dashboard bgColor="bg-primary" icon="bi bi-shield-lock-fill" title="Total Admin"
                subtitle="{{ $admin }} orang" />
        </div>

        {{-- Total Customer --}}
        <div class="col-lg-4 col-md-6">
            <x-card-dashboard bgColor="bg-success" icon="bi bi-person-fill-add" title="Total Customer"
                subtitle="{{ $customer }} orang" />
        </div>
    </div>


    <div class="row">
        {{-- Task --}}
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tugas Sprint Terbaru</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-lg">
                            <thead>
                                <tr>
                                    <th>Nama Project</th>
                                    <th>Nama Staff</th>
                                    <th>Status</th>
                                    <th>Deadline</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($this->getDataTask as $task)
                                    <tr>
                                        <td>{{ $task->project->name }}</td>
                                        <td>{{ $task->user->name }}</td>
                                        <td>
                                            @if ($task->status == 'to_do')
                                                <span class="badge bg-warning">Pending</span>
                                            @elseif ($task->status == 'in_progress')
                                                <span class="badge bg-primary">On Progress</span>
                                            @elseif ($task->status == 'done')
                                                <span class="badge bg-success">Done</span>
                                            @endif
                                        </td>
                                        <td>{{ $task->due_date }}</td>
                                        <td>
                                            {{-- Ingatkan staff untuk segera menyelesaikan pekerjaan lewat whatsapp --}}
                                            <a href="https://wa.me/{{ $task->assignee_name }}"
                                                class="btn btn-sm btn-success" target="_blank">
                                                <i class="bi bi-whatsapp"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">-- Tugas belum ada --</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <small class="text-danger">*Tekan icon whatsapp untuk bertanya soal progress ke staff
                            terkait</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Statistik Pendapatan ( 2024 )</h4>
                </div>
                <div class="card-body row">

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
                                        <h3 class="mb-0 text-white">Rp. {{ number_format($pemasukkan, 0, ',', '.') }}
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
                                        <h3 class="mb-0 text-white">Rp. {{ number_format($piutang, 0, ',', '.') }}
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

    </div>
</div>
