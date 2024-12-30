<div class="card">
    <div class="card-header bg-primary">
        <h4 class="text-white card-title">Tambah Tugas</h4>
    </div>
    <div class="mt-3 card-body">
        <form wire:submit='store' class="row">
            <!-- Judul -->
            <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                <label for="title" class="form-label">Judul</label>
                <input type="text" class="form-control" id="title" wire:model="title" placeholder="Masukkan judul"
                    required>
            </div>

            <!-- Pengguna -->
            <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                <label for="user_id" class="form-label">Staff</label>
                <select class="form-select" id="user_id" wire:model="user_id">
                    <option value="">-- Pilih Staff --</option>
                    @foreach ($this->users as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                    <!-- Tambahkan pengguna lainnya sesuai kebutuhan -->
                </select>
            </div>

            <!-- Status -->
            <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" wire:model="status">
                    <option value="">-- Pilih status --</option>
                    <option value="to_do">Belum Dikerjakan</option>
                    <option value="in_progress">Sedang Dikerjakan</option>
                    <option value="done">Selesai</option>
                </select>
            </div>

            <!-- Tanggal Jatuh Tempo -->
            <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                <label for="due_date" class="form-label">Tanggal Jatuh Tempo</label>
                <input type="date" class="form-control" id="due_date" wire:model="due_date">
            </div>

            <!-- Deskripsi -->
            <div class="mb-3 col-lg-12">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="description" wire:model="description" rows="4"
                    placeholder="Masukkan deskripsi"></textarea>
            </div>

            <hr>

            <!-- Tombol Kirim -->
            <div class="mb-3 col-lg-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">
                    Tambah tugas
                </button>
            </div>
        </form>

    </div>
</div>
