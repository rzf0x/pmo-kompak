<div class="card">
    <div class="card-header">
        <h5>Tambah data</h5>
    </div>
    <div class="card-body">
        <form wire:submit.prevent="store" class="row">
            {{-- Nama Tugas --}}
            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                <label for="title">Nama Tugas</label>
                <input type="text" class="form-control" id="title" wire:model="title">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Project terkait --}}
            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                <label for="project_id">Project</label>
                <select class="form-control" id="project_id" wire:model="project_id">
                    <option value="">-- Pilih Project --</option>
                    @foreach ($this->projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
                @error('project_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Assign Orang --}}
            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                <label for="user_id">Assign To</label>
                <select class="form-control" id="user_id" wire:model="user_id">
                    <option value="">-- Pilih Staff --</option>
                    @foreach ($this->users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('user_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Deadline --}}
            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                <label for="due_date">due_date</label>
                <input type="date" class="form-control" id="due_date" wire:model="due_date">
                @error('due_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            {{-- Status --}}
            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                <label for="status">status</label>
                <select class="form-control" id="status" wire:model="status">
                    <option value="">-- Pilih Status --</option>
                    <option value="to_do">Belum Selesai</option>
                    <option value="in_progress">Dalam Progress</option>
                    <option value="done">Selesai</option>
                </select>
                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Deskripsi --}}
            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                <label for="description">Deskripsi</label>
                <textarea class="form-control" id="description" wire:model="description"></textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <hr>

            <div class="gap-2 form-group col-12 d-flex justify-content-end">
                {{-- Button Tambah --}}
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-plus-circle-fill"></i>
                    Tambah Task
                </button>

                {{-- Button Cancel --}}
                <button type="button" class="btn btn-danger" wire:click="cancelCreateTask">
                    <i class="bi bi-x-circle-fill"></i>
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>
