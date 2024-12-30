<div class="card">
    <div class="card-body">
        <form wire:submit.prevent="store">
            {{-- Deskripsi Project --}}
            <h6>Deskripsi Project</h6>
            <div class="row g-3">
                <!-- Nama Project -->
                <div class="col-md-6">
                    <label for="name" class="form-label">Nama Project</label>
                    <input type="text" class="form-control" id="name" wire:model="project_name"
                        placeholder="Masukkan nama project">
                </div>

                <div class="col-md-6">
                    <label for="name" class="form-label">Nilai Project</label>
                    <input type="number" class="form-control" id="name" wire:model="amount"
                        placeholder="Masukkan nilai project">
                </div>

                <!-- Kategori -->
                <div class="col-md-6">
                    <label for="category" class="form-label">Status</label>
                    <select class="form-select" id="category" wire:model="category">
                        <option value="">-- Pilih status --</option>
                        <option value="rencana">Rencana</option>
                        <option value="berlangsung">Berlangsung</option>
                        <option value="selesai">Selesai</option>
                        <option value="lunas">Lunas</option>
                        <option value="batal">Batal</option>
                        <option value="tertunda">Tertunda</option>
                    </select>
                </div>

                <!-- Client -->
                <div class="col-md-6">
                    <label for="customer_id" class="form-label">Client</label>
                    <select class="form-select" id="customer_id" wire:model="customer_id">
                        <option value="">-- Pilih client --</option>
                        @foreach ($this->customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Tanggal Mulai -->
                <div class="col-md-6">
                    <label for="start_date" class="form-label">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="start_date" wire:model="start_date">
                </div>

                <!-- Tanggal Selesai -->
                <div class="col-md-6">
                    <label for="end_date" class="form-label">Tanggal Selesai</label>
                    <input type="date" class="form-control" id="end_date" wire:model="end_date">
                </div>

                <!-- Deskripsi -->
                <div class="col-md-12">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="description" wire:model="description" rows="3"
                        placeholder="Masukkan deskripsi project"></textarea>
                </div>

                <hr>

                <p class="text-danger">
                    *Kalau data admin tidak ada, silahkan tambahkan data admin terlebih dahulu di
                    <a href="{{ route('superadmin.create-customer') }}">
                        <strong>sini</strong>
                    </a>
                </p>

                <!-- Tombol Submit -->
                <div class="mt-4 col-12 text-end">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-secondary">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>
