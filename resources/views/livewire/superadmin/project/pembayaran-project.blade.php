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
        {{-- Total Omset --}}
        <div class="col-lg-4 col-md-4 col-sm-6">
            <x-card-dashboard bgColor="bg-danger" icon="bi bi-wallet" title="Nilai Project"
                subtitle="Rp. {{ $totalProject }}" />
        </div>

        {{-- Total Pemasukkan --}}
        <div class="col-lg-4 col-md-4 col-sm-6">
            <x-card-dashboard bgColor="bg-warning" icon="bi bi-arrow-up-circle" title="Total Pemasukkan"
                subtitle="Rp. {{ $totalPemasukkan }}" />
        </div>

        {{-- Total Piutang --}}
        <div class="col-lg-4 col-md-4 col-sm-6">
            <x-card-dashboard bgColor="bg-success" icon="bi bi-currency-dollar" title="Total Piutang"
                subtitle="Rp. {{ $totalPiutang }}" />
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-primary d-flex justify-content-between align-content-center">
            <h5 class="text-white align-self-center">Pembayaran Project</h5>
            <a href="{{ route('superadmin.project-add-pembayaran', ['id' => $project]) }}">
                <button class="bg-white text-primary btn">Tambah Pembayaran</button>
            </a>
        </div>
        <div class="mt-3 card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pembayaran</th>
                            <th>Tipe Pembayaran</th>
                            <th>Jumlah Pembayaran</th>
                            <th>Tanggal Pembayaran</th>
                            <th>Bukti Pembayaran</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($this->payment as $index => $payment)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $payment->payment_name }}</td>
                                <td>{{ ucfirst($payment->payment_type) }}</td>
                                <td>{{ number_format($payment->amount_paid, 2, ',', '.') }}</td>
                                <td>{{ \Carbon\Carbon::parse($payment->payment_date)->format('d-m-Y') }}</td>
                                <td>
                                    @if ($payment->payment_proof)
                                        <a href="{{ asset('storage/' . $payment->payment_proof) }}" target="_blank">
                                            Lihat Bukti
                                        </a>
                                    @else
                                        Tidak ada bukti
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="">
                                        <button class="btn btn-warning">
                                            <i class="bi bi-pencil-fill"></i>
                                        </button>
                                    </a>
                                    <button class="btn btn-danger" wire:click="delete({{ $payment->id }})">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
