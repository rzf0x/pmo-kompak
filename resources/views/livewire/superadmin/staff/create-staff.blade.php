<div class="card">
    <div class="card-header bg-primary">
        <h4 class="text-white">Tambah Staff</h4>
    </div>
    <div class="mt-3 card-body">
        <form wire:submit.prevent="store">
            {{-- Nama Staff --}}
            <div class="form-group">
                <label for="name">Nama Staff</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    wire:model="name">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Email --}}
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    wire:model="email">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Password --}}
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    wire:model="password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <hr>

            <div class="d-flex justify-content-end col-12">
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>
