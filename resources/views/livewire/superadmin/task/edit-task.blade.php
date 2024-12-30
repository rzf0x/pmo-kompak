<div class="card">
    <div class="card-header bg-primary d-flex justify-content-between">
        <h5 class="text-white align-self-center">
            Edit Task
        </h5>

        <a href="{{ route('superadmin.list-task') }}">
            <button class="btn btn-light text-primary">
                Kembali
            </button>
        </a>
    </div>
    <div class="mt-3 card-body">
        <form wire:submit.prevent="updateTask" class="row">
            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                <label for="title">Nama Tugas</label>
                <input type="text" class="form-control" id="title" wire:model="title">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

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

            {{-- User --}}
            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                <label for="user_id">User</label>
                <select class="form-control" id="user_id" wire:model="user_id">
                    <option value="">-- Pilih User --</option>
                    @foreach ($this->users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('user_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                <label for="due_date">Deadline</label>
                <input type="date" class="form-control" id="due_date" wire:model="due_date">
                @error('due_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                <label for="status">Status</label>
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

            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                <label for="description">Deskripsi</label>
                <textarea class="form-control" id="description" wire:model="description"></textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <hr>

            <div class="form-group col-lg-12 col-md-12 col-sm-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
