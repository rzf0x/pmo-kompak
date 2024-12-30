<div>
    <div class="mt-4 row">
        {{-- Pending --}}
        <div class="col-lg-4 col-md-6 col-sm-12">
            <x-card-dashboard bgColor="bg-warning" icon="bi bi-hourglass-split" title="Pembayaran Tertunda"
                subtitle="{{ $paymentPending }} Project" />
        </div>

        {{-- Success --}}
        <div class="col-lg-4 col-md-6 col-sm-12">
            <x-card-dashboard bgColor="bg-success" icon="bi bi-check-circle-fill" title="Pembayaran Sukses"
                subtitle="{{ $paymentSuccess }} Project" />
        </div>

        {{-- Failed --}}
        <div class="col-lg-4 col-md-6 col-sm-12">
            <x-card-dashboard bgColor="bg-danger" icon="bi bi-exclamation-circle-fill" title="Pembayaran Gagal"
                subtitle="{{ $paymentFailed }} Project" />
        </div>

        {{-- Cicilan --}}
        <div class="col-lg-6 col-sm-12">
            <x-card-dashboard bgColor="bg-primary" icon="bi bi-wallet-fill" title="Cicilan"
                subtitle="{{ $paymentCicilan }} Project" />
        </div>

        {{-- Transfer --}}
        <div class="col-lg-6 col-sm-12">
            <x-card-dashboard bgColor="bg-info" icon="bi bi-bank2" title="Transfer"
                subtitle="{{ $paymentTransfer }} Project" />
        </div>
    </div>

    <div class="card">
        <div class="card-body">

            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Tipe</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Nominal</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Bukti</th>
                        <th class="text-center">Project Terkait</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($this->payments as $payment)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $payment->payment_name }}</td>
                            <td class="text-center">{{ $payment->payment_type }}</td>
                            <td class="text-center">
                                @if ($payment->payment_status == 'pending')
                                    <span class="badge bg-warning">Pending</span>
                                @elseif ($payment->payment_status == 'success')
                                    <span class="badge bg-success">Success</span>
                                @elseif ($payment->payment_status == 'failed')
                                    <span class="badge bg-danger">Failed</span>
                                @endif
                            </td>
                            <td class="text-center">{{ $payment->amount_paid }}</td>
                            <td class="text-center">{{ $payment->payment_date }}</td>
                            <td class="text-center">
                                <button type="button" wire:click="showPaymentProof({{ $payment->id }})"
                                    class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#default">
                                    Lihat Bukti
                                </button>

                                <div class="text-left modal fade" id="default" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel1">Basic Modal</h5>
                                                <button type="button" class="close rounded-pill"
                                                    data-bs-dismiss="modal" aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Cek apakah bukti pembayaran tersedia -->
                                                @if ($paymentProof)
                                                    <div class="text-center">
                                                        <img src="{{ $paymentProof }}" alt="Bukti Pembayaran"
                                                            class="rounded img-fluid">
                                                    </div>
                                                @else
                                                    <p class="text-center text-danger">Bukti pembayaran tidak
                                                        ditemukan.</p>
                                                @endif
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn" data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Close</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">{{ $payment->revenue->project->name }}</td>
                            <td class="text-center">
                                {{-- Edit Button --}}
                                <button type="button" wire:click="editPayment({{ $payment->id }})"
                                    class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#edit">
                                    Edit
                                </button>

                                {{-- Hapus Button --}}
                                <button type="button" wire:click="deletePayment({{ $payment->id }})"
                                    class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

</div>
