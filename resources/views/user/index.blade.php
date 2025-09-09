@extends('template.main')
@section('title', $title)
@section('content')
    <div class="container-xxl">
        <h4 class="py-1 mb-2"><?= $title ?></h4>
        <div class="row">
            <div class="card">
                @can('tambah-pengguna')
                    <div class="text-end mt-3 me-3">
                        <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm rounded"><i
                                class="fa-solid fa-plus me-1"></i> Tambah Data</a>
                    </div>
                @endcan
                <div class="card-datatable table-responsive">
                    <table class="dt-responsive table table-bordered table-hover" id="tbuser">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th>Status</th>
                                <th>Image</th>
                                @canany(['edit-pengguna', 'hapus-pengguna'])
                                    <th>Aksi</th>
                                @endcanany
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->role->name }}</td>
                                    <td>{!! $user->status == 1
                                        ? '<span class="badge rounded-pill bg-info">Aktif</span>'
                                        : '<span class="badge rounded-pill bg-danger">Non Aktif</span>' !!}</td>
                                    <td>
                                        @if ($user->image)
                                            <img src="{{ asset('storage/' . $user->image) }}" width="80" height="80"
                                                class="rounded" alt="image">
                                        @else
                                            @php
                                                $avatarName = urlencode($user->name);
                                                $avatarUrl = "https://ui-avatars.com/api/?name={$avatarName}&background=random";
                                            @endphp
                                            <img src="{{ $avatarUrl }}" width="80" height="80" class="rounded"
                                                alt="image">
                                        @endif
                                    </td>
                                    <td>
                                        @can('edit-pengguna')
                                            <a href="{{ route('user.edit', ['user' => $user->id]) }}"
                                                class="btn btn-warning btn-sm rounded">Edit</a>
                                        @endcan
                                        @can('hapus-pengguna')
                                            <form action="{{ route('user.destroy', ['user' => $user->id]) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <a href="#" id="btn-delete" class="btn btn-danger btn-sm rounded">Hapus</a>
                                            </form>
                                        @endcan
                                    </td>
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
            $('#tbuser').DataTable({
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