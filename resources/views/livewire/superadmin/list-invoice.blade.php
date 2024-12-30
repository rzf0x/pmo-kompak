<div class="card">
    <div class="card-header bg-primary d-flex justify-content-between">
        <h5 class="text-white align-self-center">List Invoices</h5>
        <button class="btn btn-light text-primary btn-sm" wire:click="create">
            Buat Invoice
        </button>
    </div>
    <div class="mt-3 card-body">
        <table class="table table-responsive table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Invoice</th>
                    <th>Nama</th>
                    <th>Tanggal Buat</th>
                    <th>Deadline</th>
                    <th>Project</th>
                    <th>Nominal</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($this->invoices as $invoice)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $invoice->no_invoice }}</td>
                        <td>{{ $invoice->invoice_name }}</td>
                        <td>{{ $invoice->invoice_date }}</td>
                        <td>{{ $invoice->due_date }}</td>
                        <td>{{ $invoice->project->name }}</td>
                        <td>{{ $invoice->amount }}</td>
                        <td>
                            @if ($invoice->status == 'draft')
                                <span class="badge bg-warning">{{ $invoice->status }}</span>
                            @elseif ($invoice->status == 'sent')
                                <span class="badge bg-primary">{{ $invoice->status }}</span>
                            @elseif ($invoice->status == 'paid')
                                <span class="badge bg-success">{{ $invoice->status }}</span>
                            @else
                                <span class="badge bg-danger">{{ $invoice->status }}</span>
                            @endif
                        </td>
                        <td>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
