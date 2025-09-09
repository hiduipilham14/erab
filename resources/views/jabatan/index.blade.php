@extends('template.main')
@section('title', $title)
@section('content')
    <div class="container-xxl">
        <h4 class="py-1 mb-2"><?= $title ?></h4>
        <div class="row">
            <div class="card">
                @can('tambah-jabatan')
                    <div class="text-end mt-3 me-3">
                        <a href="{{ route('jabatan.create') }}" class="btn btn-primary btn-sm rounded"><i
                                class="fa-solid fa-plus me-1"></i> Tambah Data</a>
                    </div>
                @endcan
                <div class="card-datatable table-responsive">
                    <table class="dt-responsive table table-bordered table-hover" id="tbjabatan">
                        <thead>
                            <tr>
                                <th><b>No</b></th>
                                <th><b>Nama jabatan</b></th>
                                <th><b>Keterangan</b></th>
                                @if (auth()->user()->hasAnyPermission(['edit-jabatan', 'hapus-jabatan']))
                                    <th><b>Aksi</b></th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $value)
                                <tr>
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->note }}</td>
                                    @canany(['edit-jabatan', 'hapus-jabatan'])
                                        <td>
                                            @can('edit-jabatan')
                                                <a href="{{ route('jabatan.edit', ['jabatan' => $value->id]) }}"
                                                    class="btn btn-warning btn-sm rounded">Edit</a>
                                            @endcan
                                            @can('hapus-jabatan')
                                                <form action="{{ route('jabatan.destroy', ['jabatan' => $value->id]) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="#" id="btn-delete" class="btn btn-danger btn-sm rounded">Hapus</a>
                                                </form>
                                            @endcan
                                        </td>
                                    @endcanany
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#tbjabatan').DataTable({
                responsive: true,
                // lengthChange: false,
                columnDefs: [{
                        "className": "dt-center",
                        "targets": "_all"
                    }

                ],
            });
        })
    </script>
@endsection