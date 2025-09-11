        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
                <a href="" class="app-brand-link">
                    {{-- <span class="app-brand-logo demo"> --}}
                    <img src="{{ asset('logo.png') }}" alt="" width="60px">

                    <span class="app-brand-text demo menu-text fw-bold">E-RAB</span>
                </a>

                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                    <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
                    <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">
                <!-- Dashboards -->
                <li class="menu-item active open">
                    <a href="{{ url('dashboard') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-layout-dashboard"></i>
                        <div>Dashboard</div>
                    </a>
                </li>

                <!-- Apps & Pages -->
                @canany(['lihat-divisi','lihat-diameter','lihat-pipa'])
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">DATA MASTER</span>
                </li>
                @can('lihat-divisi')
                <li class="menu-item">
                    <a href="{{ url('data-divisi') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-building"></i>
                        <div>Data Divisi</div>
                    </a>
                </li>
                @endcan

                @can('lihat-diameter')
                <li class="menu-item">
                    <a href="{{ url('data-diameter') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-dimensions"></i>
                        <div>Data Diameter</div>
                    </a>
                </li>
                @endcan
                @can('lihat-pipa')
                <li class="menu-item">
                    <a href="{{ url('data-pipa') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-replace"></i>
                        <div>Data Pipa</div>
                    </a>
                </li>
                @endcan
                @endcanany
                <li class="menu-item">
                    <a href="{{ url('data-tahun') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-replace"></i>
                        <div>Data Tahun</div>
                    </a>
                </li>
                <!-- RAB -->
                @canany(['lihat-rab'])
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">RAB</span>
                </li>
                @can('lihat-rab')
                <li class="menu-item">
                    <a href="{{ url('data-rab') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-calculator"></i>
                        <div>RAB</div>
                    </a>
                </li>
                @endcan
                @endcanany

                <!-- GIS -->
                @canany(['lihat-gis','lihat-jaringan-baru','lihat-penggantian-pipa'])
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">GIS</span>
                </li>
                @can('lihat-gis')
                <li class="menu-item">
                    <a href="{{ url('data-update-gis') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-map-pin"></i>
                        <div>Update GIS</div>
                    </a>
                </li>
                @endcan
                @can('lihat-jaringan-baru')
                <li class="menu-item">
                    <a href="{{ url('data-jaringan-baru') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-network"></i>
                        <div>Jaringan Baru</div>
                    </a>
                </li>
                @endcan
                @can('lihat-penggantian-pipa')
                <li class="menu-item">
                    <a href="{{ url('data-penggantian-pipa') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-replace"></i>
                        <div>Penggantian Pipa</div>
                    </a>
                </li>
                @endcan
                @endcanany
                <li class="menu-item">
                    <a href="{{ url('spam') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-replace"></i>
                        <div>Spam</div>
                    </a>
                </li>
                <!-- Laporan -->
                @canany(['lihat-laporan-rab','lihat-laporan-gis'])
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">LAPORAN</span>
                </li>
                @can('lihat-laporan-rab')
                <li class="menu-item">
                    <a href="{{ url('laporan-rab') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-report-analytics"></i>
                        <div>RAB</div>
                    </a>
                </li>
                @endcan
                @can('lihat-laporan-gis')
                <li class="menu-item">
                    <a href="{{ url('laporan-gis') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-report-analytics"></i>
                        <div>GIS</div>
                    </a>
                </li>
                @endcan
                @endcanany

                <!-- Data User -->
                @canany(['lihat-pengguna','lihat-akses', 'lihat-jabatan'])
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">DATA USER</span>
                </li>
                @can('lihat-pengguna')
                <li class="menu-item">
                    <a href="{{ url('user') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-users"></i>
                        <div>Data Pengguna</div>
                    </a>
                </li>
                @endcan
                @can('lihat-jabatan')
                <li class="menu-item">
                    <a href="{{ url('jabatan') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-badge"></i>
                        <div>Jabatan</div>
                    </a>
                </li>
                @endcan
                @can('lihat-akses')
                <li class="menu-item">
                    <a href="{{ route('akses.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-lock-access"></i>
                        <div>Level Akses</div>
                    </a>
                </li>
                @endcan
                @endcanany

                <!-- Pengaturan -->
                @can('lihat-profile')
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">PENGATURAN</span>
                </li>
                <li class="menu-item">
                    <a href="{{ url('pengaturan-akun') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user-circle"></i>
                        <div>Profil</div>
                    </a>
                </li>
                @endcan
            </ul>

        </aside>
