<div class="sidebar-wrapper active">
    <div class="mt-2 mb-5 sidebar-header position-relativ">
        <a href="/superadmin/dashboard" wire:navigate>
            <img src="{{ asset('logo-samping.png') }}" alt="Logo" style="width: 200px; height: 45px;">
        </a>
    </div>
    <div class="sidebar-menu" style="margin-top: -35px !important;">
        <ul class="menu">

            {{-- Home Route --}}
            <li class="sidebar-title">Home</li>
            <li class="sidebar-item {{ Request::routeIs('superadmin.dashboard') ? 'active' : '' }}">
                <a href="/superadmin/dashboard" class='sidebar-link'>
                    <i class="bi bi-speedometer"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            {{-- #Home Route --}}

            {{-- Master Data Route --}}
            <li class="sidebar-title">Data Project</li>

            <li class="sidebar-item {{ Request::is('superadmin/list/project*') ? 'active' : '' }}">
                <a href="/superadmin/list/project" class='sidebar-link'>
                    <i class="bi bi-list-task"></i>
                    <span>List Project</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::is('superadmin/list/task*') ? 'active' : '' }}">
                <a href="/superadmin/list/task" class='sidebar-link'>
                    <i class="bi bi-check2-circle"></i>
                    <span>List Task</span>
                </a>
            </li>

            <li class="sidebar-title">Data Revenue</li>

            <li class="sidebar-item {{ Request::routeIs('superadmin.list-pembayaran') ? 'active' : '' }}">
                <a href="/superadmin/list/pembayaran" class='sidebar-link'>
                    <i class="bi bi-wallet2"></i>
                    <span>List Pembayaran</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::routeIs('superadmin.list-invoice') ? 'active' : '' }}">
                <a href="/superadmin/list/invoice" class='sidebar-link'>
                    <i class="bi bi-receipt-cutoff"></i>
                    <span>List Invoice</span>
                </a>
            </li>
            {{-- #Master Data Route --}}

            <livewire:auth.logout />

        </ul>
    </div>
</div>
