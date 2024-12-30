<div class="card">
    <div class="card-header">
        <h3 class="card-title">Profil Staff</h3>
    </div>

    <div class="card-body">
        <!-- Flash Message -->
        @if (session()->has('success'))
            <div class="alert alert-success" id="flash-message">
                {{ session('success') }}
            </div>
            <script>
                setTimeout(function() {
                    const flashMessage = document.getElementById('flash-message');
                    if (flashMessage) {
                        flashMessage.style.transition = "opacity 0.5s ease";
                        flashMessage.style.opacity = "0";
                        setTimeout(() => flashMessage.remove(), 500); // Hapus elemen setelah animasi
                    }
                }, 3000); // Tunggu 3 detik sebelum mulai menghilangkan
            </script>
        @endif


        <div class="row">
            <form wire:submit.prevent="updateProfile">
                <div class="form-group col-lg-6">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" wire:model="name">
                    @error('name')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-lg-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" wire:model="email">
                    @error('email')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-lg-6">
                    <label for="no_whatsapp">Telepon</label>
                    <input type="number" class="form-control" id="no_whatsapp" wire:model="no_whatsapp">
                    @error('no_whatsapp')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-lg-6">
                    <label for="address">Alamat</label>
                    <textarea class="form-control" id="address" wire:model="address"></textarea>
                    @error('address')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <div class="form-group col-lg-6">
                        <label for="photo">Foto</label>
                        <input type="file" class="form-control" id="photo" wire:model="photo">
                        @error('photo')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Preview Image -->
                    @if ($photoPreview)
                        <div class="mt-3">
                            <p>Preview:</p>
                            <img src="{{ $photoPreview }}" alt="Preview" class="img-fluid" style="max-height: 200px;">
                        </div>
                    @endif
                </div>


                <div class="form-group col-lg-6">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" wire:model="password">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                <i class="bi bi-eye-fill" id="toggleIcon"></i>
                            </button>
                        </div>
                    </div>
                    @error('password')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <script>
                    document.getElementById('togglePassword').addEventListener('click', function() {
                        const passwordInput = document.getElementById('password');
                        const toggleIcon = document.getElementById('toggleIcon');
                        const isPassword = passwordInput.type === 'password';

                        passwordInput.type = isPassword ? 'text' : 'password';
                        toggleIcon.classList.toggle('bi-eye-fill');
                        toggleIcon.classList.toggle('bi-eye-slash');
                    });
                </script>


                <hr>
                <div class="form-group col-lg-12 d-flex justify-content-end">
                    <button class="btn btn-primary" type="submit">Update Profil</button>
                </div>
            </form>
        </div>
    </div>
</div>
