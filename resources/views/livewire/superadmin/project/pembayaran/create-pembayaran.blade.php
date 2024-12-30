<div class="card">
    <div class="card-header bg-primary">
        <h4 class="text-white card-title">Tambah Pembayaran</h4>
    </div>
    <div class="mt-3 card-body">
        <form wire:submit.prevent="store" class="row">
            {{-- Nama Pembayaran --}}
            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                <label for="payment_name">Nama Pembayaran</label>
                <input type="text" class="form-control" id="payment_name" wire:model="payment_name">
                @error('payment_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Tipe Pembayaran --}}
            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                <label for="payment_type">Tipe Pembayaran</label>
                <select class="form-control" id="payment_type" wire:model="payment_type">
                    <option value="">Pilih Tipe Pembayaran</option>
                    <option value="cicilan">Cicilan</option>
                    <option value="transfer">Transfer</option>
                </select>
                @error('payment_type')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Jumlah Pembayaran --}}
            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                <label for="amount_paid">Jumlah Pembayaran</label>
                <input type="number" class="form-control" id="amount_paid" wire:model="amount_paid">
                @error('amount_paid')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Tanggal Pembayaran --}}
            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                <label for="payment_date">Tanggal Pembayaran</label>
                <input type="date" class="form-control" id="payment_date" wire:model="payment_date">
                @error('payment_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Bukti Pembayaran --}}
            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                <label for="bukti_pembayaran">Bukti Pembayaran</label>
                <input type="file" class="form-control" id="bukti_pembayaran" wire:model="bukti_pembayaran">
                @error('bukti_pembayaran')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <hr>

            {{-- Button Submit --}}
            <div class="form-group col-lg-12 col-md-12 col-sm-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
