<div>
    <li class="sidebar-item">
        <button class="btn btn-danger w-100" onclick="confirmLogout()">
            Logout
        </button>

        <script>
            function confirmLogout() {
                Swal.fire({
                    title: 'Yakin ingin keluar ?',
                    text: "Anda akan keluar dari aplikasi saat ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Keluar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('triggerLogout');
                    }
                });
            }
        </script>
    </li>

</div>
