<div class="card">
    <div class="card-header">
        <h4>Tambah Customer</h4>
    </div>

    <div class="card-body">
        <form wire:submit.prevent="store" class="row">
            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                <label for="name">Name</label>
                <input type="text" wire:model="name" class="form-control">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                <label for="email">Email</label>
                <input type="email" wire:model="email" class="form-control">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                <label for="phone">Phone</label>
                <input type="text" wire:model="phone" class="form-control">
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                <label for="address">Address</label>
                <textarea wire:model="address" class="form-control"></textarea>
                @error('address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <hr>

            <div class="gap-1 col-lg-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">
                    Tambah Customer
                </button>
                <a href="{{ route('superadmin.list-customer') }}" class="mr-2 btn btn-secondary">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
