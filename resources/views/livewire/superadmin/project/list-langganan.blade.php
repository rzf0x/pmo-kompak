<div>
    <x-detail-navbar-button :buttons="[
        [
            'route' => 'superadmin.detail-project',
            'class' => 'btn-primary',
            'icon' => '📊',
            'label' => 'Detail Project',
            'params' => ['id' => $project],
        ],
        [
            'route' => 'superadmin.project-task',
            'class' => 'btn-secondary',
            'icon' => '📝',
            'label' => 'Daftar Task',
            'params' => ['id' => $project],
        ],
        [
            'route' => 'superadmin.project-pembayaran',
            'class' => 'btn-secondary',
            'icon' => '💰',
            'label' => 'Pembayaran',
            'params' => ['id' => $project],
        ],
        [
            'route' => 'superadmin.project-invoice',
            'class' => 'btn-secondary',
            'icon' => '🧾',
            'label' => 'List Invoice',
            'params' => ['id' => $project],
        ],
        [
            'route' => 'superadmin.project-dokumen',
            'class' => 'btn-secondary',
            'icon' => '📂',
            'label' => 'List Dokumen',
            'params' => ['id' => $project],
        ],
        [
            'route' => 'superadmin.project-langganan',
            'class' => 'btn-secondary',
            'icon' => '🔄',
            'label' => 'Langganan',
            'params' => ['id' => $project],
        ],
    ]" />
</div>
