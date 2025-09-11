<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Optimized Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-3qF0TF+B7MEkh5XHZRshpRBBtZC+i7H/CNsKTeRYaeNS4W6pQ7p4ByOaN5SvM7Zkfg9ZxeMJx8vUAbq9Z0J0+Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @include('admin.css')
</head>

<body>
    <div class="container-scroller">
        @include('admin.navbar')

        <div class="container-fluid page-body-wrapper">
            @include('admin.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="row">
                                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                    <h5 class="">Dashboard > Role</h5>
                                </div>
                                <div class="col-12 col-xl-4">
                                    <div class="justify-content-end d-flex">
                                        <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                            <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <i class="mdi mdi-calendar"></i> Today ({{ \Carbon\Carbon::now()->translatedFormat('d F Y') }})

                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                                <a class="dropdown-item" href="#">January - March</a>
                                                <a class="dropdown-item" href="#">March - June</a>
                                                <a class="dropdown-item" href="#">June - August</a>
                                                <a class="dropdown-item" href="#">August - November</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- CARD DATA RAB -->
                    <div class="row">
                        <div class="card w-100">
                            <div class="card-body">
                                <!-- Header dengan judul dan tombol -->
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <p class="card-title">List Role</p>
                                    </div>
                                    <div class="col-6 text-right">
                                       <a href="{{ url('role/create') }}"> <button type="button" class="btn btn-success" title="Tambah Data">
                                        <i class="fa-solid fa-plus"></i>
                                    </button></a>
                                    </div>
                                </div>

                                <!-- Tabel Data -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table id="example" class="display expandable-table" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        {{-- <th>Role</th> --}}
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data as $index => $item)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>{{ $item->name }}</td>
                                                            {{-- <td>{{ $item->role }}</td> --}}
                                                            <td>
                                                                <a href="{{ route('role.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                                <form action="{{ route('role.destroy', $item->id) }}" method="POST" style="display:inline;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')">Hapus</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Tabel -->
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->

                </div>
                <!-- content-wrapper ends -->

                <!-- Footer -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
                            © 2025 PERUMDA AIR MINUM TIRTA MULIA KAB. PEMALANG
                        </span>
                    </div>
                </footer>

                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    @include('admin.js')


</body>

</html>
