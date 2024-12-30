<div class="card">
    <div class="card-body">
        <form wire:submit.prevent="updateTask" class="row">
            {{-- Nama Tugas --}}
            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                <label for="title">Task</label>
                <input type="text" class="form-control" id="title" wire:model="title" readonly>
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Deadline --}}
            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                <label for="due_date">Deadline</label>
                <input type="date" class="form-control" id="due_date" wire:model="due_date" readonly>
                @error('due_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Status --}}
            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                <label for="status">Status</label>
                <select class="form-control" id="status" wire:model="status">
                    <option value="to_do">To Do</option>
                    <option value="in_progress">In Progress</option>
                    <option value="done">Done</option>
                </select>
                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Project --}}
            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                <label for="project_name">Project Terkait</label>
                <input type="text" class="form-control" id="project_name" wire:model="project_name" readonly>
                @error('project_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Deskripsi --}}
            <div class="form-group col-12">
                <label for="description">Description</label>
                <textarea class="form-control" cols="15" rows="5" id="description" wire:model="description" readonly></textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <hr>

            <small class="text-danger">
                * Hanya bisa mengubah status tugas yang diberikan oleh admin/superadmin
            </small>

            {{-- Button Update --}}
            <div class="gap-1 form-group col-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('staff.list-task') }}" class="mr-2 btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
