@extends('template.main')
@section('title', $title)
@section('content')

    <div class="container-xxl flex-grow-1">
        <h4 class="mb-4">Daftar Jabatan</h4>
        <!-- Role cards -->
        <div class="row g-4">
            @foreach ($role as $data)
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h6 class="fw-normal mb-2">Total {{ $data->users->count() }} pengguna</h6>
                                <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                    @foreach ($data->users->take(4) as $user)
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                            title="{{ $user->name }}" class="avatar avatar-sm pull-up">
                                            @if ($user->image)
                                                <img class="rounded-circle" src="{{ asset('storage/' . $user->image) }}"
                                                    alt="Avatar" />
                                            @else
                                                @php
                                                    $avatarName = urlencode($user->name);
                                                    $avatarUrl = "https://ui-avatars.com/api/?name={$avatarName}&background=random";
                                                @endphp
                                                <img class="rounded-circle" src="{{ $avatarUrl }}" alt="Avatar" />
                                            @endif
                                        </li>
                                    @endforeach
                                    @if ($data->users->count() > 4)
                                        <li class="avatar">
                                            <span class="avatar-initial rounded-circle pull-up" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom"
                                                data-bs-original-title="{{ $data->users->count() - 4 }} lagi">+{{ $data->users->count() - 4 }}</span>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            @can('edit-akses')
                                <div class="d-flex justify-content-between align-items-end mt-1">
                                    <div class="role-heading">
                                        <h4 class="mb-1">{{ $data->name }}</h4>
                                        <a href="javascript:;" data-bs-toggle="modal" data-id="{{ $data->id }}"
                                            data-name="{{ $data->name }}" data-bs-target="#addRoleModal"
                                            class="role-edit-modal">
                                            <span>Edit Akses</span>
                                        </a>
                                    </div>
                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-id="{{ $data->id }}"
                                        data-name="{{ $data->name }}" data-bs-target="#addRoleModal"
                                        class="text-muted role-edit-modal">
                                        <i class="ti ti-edit ti-md"></i>
                                    </a>
                                </div>
                            @endcan
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="col-12">
                <!-- Role Table -->
                <div class="card">
                    <div class="card-datatable table-responsive">
                        <table class="dt-responsive table table-bordered table-hover" id="tbpermission">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Group</th>
                                    <th class="text-center">Akses Menu</th>
                                    <th class="text-center">Jabatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_akses as $value)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}.</td>
                                        <td>Modul {{ ucfirst($value->group) }}</td>
                                        <td>{{ ucfirst(str_replace('-', ' ', $value->name)) }}</td>
                                        <td>{{ $value->roles->pluck('name')->implode(', ') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--/ Role Table -->
            </div>
        </div>
        <!--/ Role cards -->

        <!-- Add Role Modal -->
        <div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen modal-dialog-scrollable modal-add-new-role">
                <form class="row g-3" action="{{ route('akses.store') }}" method="POST">
                    @csrf
                    <div class="modal-content p-3 p-md-5">
                        <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        <div class="modal-body">
                            <div class="text-center mb-4">
                                <h3 class="role-title mb-2">Edit Akses</h3>
                                <p class="text-muted">Atur akses menu</p>
                            </div>
                            <!-- Add role form -->

                            <div class="col-12 mb-4">
                                <label class="form-label" for="modalRoleName">Jabatan</label>
                                <input type="text" id="role" name="role" class="form-control"
                                    placeholder="Jabatan" readonly />
                            </div>
                            <div class="col-12">
                                <h5>Daftar Akses</h5>
                                <!-- Permission table -->
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-flush-spacing">
                                        <tbody>
                                            <tr>
                                                <td class="text-nowrap fw-medium" style="font-size: 14px">
                                                    Akses Administrator
                                                    <i class="ti ti-info-circle" data-bs-toggle="tooltip"
                                                        data-bs-placement="top"
                                                        title="Memungkinkan akses penuh ke sistem"></i>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="selectAll" />
                                                        <label class="form-check-label" for="selectAll" style="font-size: 14px"> Pilih Semua
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            @foreach ($permission as $data => $value)
                                                <tr>
                                                    <td class="text-nowrap fw-medium" style="font-size: 13px">{{ ucwords($data) }}</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            @foreach ($value as $list)
                                                                <div class="form-check me-3 me-lg-5"
                                                                    style="min-width: 210px">
                                                                    <input class="form-check-input permission-checkbox"
                                                                        type="checkbox" id="{{ $list->name }}"
                                                                        name="permission[]" value="{{ $list->name }}" />
                                                                    <label class="form-check-label" style="font-size: 13px"
                                                                        for="{{ $list->name }}">
                                                                        {{ ucwords(str_replace('-', ' ', $list->name)) }}
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Permission table -->
                            </div>
                            <!--/ Add role form -->
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1"><i
                                    class="fa-solid fa-floppy-disk me-1"></i> Simpan</button>
                            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i class="fa-solid fa-x me-1"></i> Batal
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--/ Add Role Modal -->
    </div>

@endsection
@section('js')
    <script>
        $(function() {
            var table = $('#tbpermission').DataTable({
                processing: true,
                responsive: true,
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.role-edit-modal');
            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const roleName = button.getAttribute('data-name');
                    const roleId = button.getAttribute('data-id');
                    document.getElementById('role').value = roleName;
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.role-edit-modal').forEach(function(element) {
                element.addEventListener('click', function() {
                    var roleId = this.getAttribute('data-id');
                    var url = '{{ route('akses.edit', ':roleId') }}';
                    url = url.replace(':roleId', roleId);
                    fetch(url)
                        .then(response => response.json())
                        .then(data => {
                            document.getElementById('role').value = data.role.name;

                            document.querySelectorAll('input[name="permission[]"]').forEach(
                                function(checkbox) {
                                    checkbox.checked = false;
                                });

                            data.role.permissions.forEach(function(permission) {
                                document.querySelector('input[value="' + permission
                                    .name + '"]').checked = true;
                            });

                            updateSelectAll();
                        });
                });
            });

            function updateSelectAll() {
                var allChecked = true;
                document.querySelectorAll('input[name="permission[]"]').forEach(function(checkbox) {
                    if (!checkbox.checked) {
                        allChecked = false;
                    }
                });

                document.getElementById('selectAll').checked = allChecked;
            }

            document.querySelectorAll('input[name="permission[]"]').forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    updateSelectAll();
                });
            });
        });
    </script>
    <script>
        $(document).on('click', '#selectAll', function() {
            var isChecked = $(this).is(':checked');
            $('.permission-checkbox').prop('checked', isChecked);
        });
    </script>
@endsection
