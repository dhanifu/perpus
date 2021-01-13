<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon d-block d-md-none">
            {{ substr(setting('name'), 0, 3) }}
        </div>
        <div class="sidebar-brand-text mx-3">{{ setting('name') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ active('/') }}">

        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Master
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ active('book', 'active', 'group') }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#book" aria-expanded="true"
            aria-controls="book">
            <i class="fas fa-fw fa-book"></i>
            <span>Buku</span>
        </a>
        <div id="book" class="collapse {{ active('book', 'show', 'group') }}" aria-labelledby="headingTwo"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Master Buku:</h6>
                <a class="collapse-item {{ active('book') }}" href="{{ route('book.index') }}">Data Buku</a>
                <a class="collapse-item {{ active('book/create') }}" href="{{ route('book.create') }}">Tambah Buku</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ active('rack') }}">
        <a class="nav-link collapsed" href="{{ route('rack.index') }}">
            <i class="fas fa-fw fa-archive"></i>
            <span>Rak Buku</span>
        </a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item {{ active('member', 'active', 'group') }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#member" aria-expanded="true"
            aria-controls="member">
            <i class="fas fa-fw fa-user"></i>
            <span>Anggota</span>
        </a>
        <div id="member" class="collapse {{ active('member', 'show', 'group') }}" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Master Anggota:</h6>
                <a class="collapse-item {{ active('member') }}" href="{{ route('member.index') }}">Data Anggota</a>
                <a class="collapse-item {{ active('member/create') }}" href="{{ route('member.create') }}">Tambah
                    Anggota</a>
            </div>
        </div>
    </li>

    @can('isAdmin')
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item {{ active('user', 'active', 'group') }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#user" aria-expanded="true"
            aria-controls="user">
            <i class="fas fa-fw fa-user-secret"></i>
            <span>Petugas</span>
        </a>
        <div id="user" class="collapse {{ active('user', 'show', 'group') }}" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Master Petugas:</h6>
                <a class="collapse-item {{ active('user') }}" href="{{ route('user.index') }}">Data Petugas</a>
                <a class="collapse-item {{ active('user/create') }}" href="{{ route('user.create') }}">Tambah
                    Petugas</a>
            </div>
        </div>
    </li>
    @endcan

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item {{ active('loan', 'active', 'group') }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#peminjaman" aria-expanded="true"
            aria-controls="peminjaman">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Peminjaman</span>
        </a>
        <div id="peminjaman" class="collapse {{ active('loan', 'show', 'group') }}" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Peminjaman:</h6>
                <a class="collapse-item {{ active('loan') }}" href="{{ route('loan.index') }}">Data Peminjaman</a>
                <a class="collapse-item {{ active('loan/create') }}" href="{{ route('loan.create') }}">Peminjaman
                    Baru</a>
                <a class="collapse-item {{ active('loan/extend') }}" href="{{ route('loan.extend') }}">Perpanjangan</a>
                <a class="collapse-item {{ active('loan/return') }}" href="{{ route('loan.return') }}">Pengembalian</a>
            </div>
        </div>
    </li>

    @can('isAdmin')
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ active('setting') }}">
        <a class="nav-link collapsed" href="{{ route('setting') }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Pengaturan</span>
        </a>
    </li>
    @endcan

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
