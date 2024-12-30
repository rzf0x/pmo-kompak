<div class="card">
    <div class="card-body">
        <form wire:submit.prevent="update" class="row">
            {{-- Nama Project --}}
            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                <label for="name">Project Name</label>
                <input type="text" class="form-control" id="name" wire:model="project_name">
                @error('project_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Nilai Project --}}
            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                <label for="value">Value</label>
                <input type="number" class="form-control" id="value" wire:model="project_value">
                @error('value')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Kategori --}}
            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                <label for="category">Category</label>
                <select class="form-control" id="category" wire:model="project_status">
                    <option value="rencana">Rencana</option>
                    <option value="berlangsung">Berlangsung</option>
                    <option value="selesai">Selesai</option>
                    <option value="lunas">Lunas</option>
                    <option value="batal">Batal</option>
                    <option value="tertunda">Tertunda</option>
                </select>
                @error('category')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Customer --}}
            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                <label for="customer">Customer</label>
                <select class="form-control" id="customer" wire:model="project_customer">
                    <option value="">-- Select Customer --</option>
                    @foreach ($this->customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
                @error('customer')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Tanggal Mulai --}}
            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                <label for="start_date">Start Date</label>
                <input type="date" class="form-control" id="start_date" wire:model="project_start_date">
                @error('start_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Tanggal Selesai --}}
            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                <label for="end_date">End Date</label>
                <input type="date" class="form-control" id="end_date" wire:model="project_end_date">
                @error('end_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Deskripsi --}}
            <div class="form-group col-lg-12">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" wire:model="project_description"></textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <hr>

            {{-- Submit --}}
            <div class="gap-2 form-group col-lg-12 col-md-12 col-sm-12 d-flex justify-content-end">
                {{-- Update button --}}
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Update
                </button>

                {{-- Cancel button --}}
                <a href="{{ route('superadmin.list-project') }}" class="ml-2 btn btn-danger">
                    <i class="bi bi-x-circle"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>
