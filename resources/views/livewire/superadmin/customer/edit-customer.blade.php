<div class="card">
    <div class="card-body">
        <form wire:submit.prevent="update">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" wire:model="name" class="form-control">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" wire:model="email" class="form-control">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" wire:model="phone" class="form-control">
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <textarea wire:model="address" class="form-control"></textarea>
                @error('address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <hr>

            <div class="gap-1 form-group d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">
                    Update Customer
                </button>
                <a href="{{ route('superadmin.list-customer') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
