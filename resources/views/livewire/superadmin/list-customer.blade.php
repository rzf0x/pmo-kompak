<div class="card">
    <div class="card-header">
        <a href="{{ route('superadmin.create-customer') }}">
            <button class="btn btn-primary">
                Tambah Customer
            </button>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($this->customers as $customer)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->address }}</td>
                            <td>
                                <a href="{{ route('superadmin.edit-customer', ['id' => $customer->id]) }}">
                                    <button class="btn btn-sm btn-primary">Edit</button>
                                </a>
                                <button onclick="confirmDelete('{{ $customer->id }}')" type="button"
                                    class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Delete
                                </button>

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
                            <td colspan="6" class="text-center">
                                Belum ada customer
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
