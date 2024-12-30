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
            <li class="sidebar-item {{ Request::routeIs('staff.dashboard') ? 'active' : '' }}">
                <a href="/staff/dashboard" class='sidebar-link'>
                    <i class="bi bi-speedometer"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            {{-- #Home Route --}}

            {{-- Master Data Route --}}
            <li class="sidebar-title">Data Project</li>

            <li class="sidebar-item {{ Request::is('staff/list-task*') ? 'active' : '' }}">
                <a href="/staff/list-task" class='sidebar-link'>
                    <i class="bi bi-check2-circle"></i>
                    <span>List Task</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::routeIs('staff.profile') ? 'active' : '' }}">
                <a href="/staff/profile" class='sidebar-link'>
                    <i class="bi bi-person"></i>
                    <span>Profil</span>
                </a>
            </li>
            {{-- #Master Data Route --}}

            <livewire:auth.logout />

        </ul>
    </div>
</div>
