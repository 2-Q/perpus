<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ Route('home') }}" class="brand-link">
        <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ Route('peminjaman.index') }}" class="nav-link" id="sidebarPeminjaman">
                        <i class="nav-icon fas fa-server"></i>
                        <p>Peminjaman</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ Route('buku.index') }}" class="nav-link" id="sidebarBuku">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Buku</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ Route('mahasiswa.index') }}" class="nav-link" id="sidebarMahasiswa">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Mahasiswa</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>