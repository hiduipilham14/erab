<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-3qF0TF+B7MEkh5XHZRshpRBBtZC+i7H/CNsKTeRYaeNS4W6pQ7p4ByOaN5SvM7Z0J0+Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @include('admin.css')
    <style>
        .checkbox-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 10px;
        }
        .checkbox-item {
            display: flex;
            align-items: center;
            gap: 5px;
        }
    </style>
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
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h5>Dashboard > Edit Role</h5>
                                </div>
                                <div class="col-md-4 text-md-end text-start">
                                    <button class="btn btn-sm btn-light bg-white">
                                        <i class="fa-solid fa-calendar mr-2"></i>
                                        {{ \Carbon\Carbon::now()->format('d M Y') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- CARD FORM ROLE -->
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">Edit Role</h5>

                                    <form method="POST" action="{{ route('role.update', $role->id) }}">
                                        @csrf
                                        @method('PUT')

                                        <!-- Field Name -->
                                        <div class="mb-4">
                                            <label for="name" class="form-label">Name:</label>
                                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $role->name) }}" required>
                                        </div>

                                        <!-- Checkbox Permissions -->
                                        <div class="mb-4">
                                            <label class="form-label">Permissions:</label>
                                            <div class="checkbox-container">
                                                @if (!$permissions->isEmpty())
                                                    @foreach ($permissions as $permission)
                                                        <div class="checkbox-item">
                                                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                                                {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                                                            <label>{{ $permission->name }}</label>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <p class="text-gray-500">Tidak ada permission tersedia.</p>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Submit button -->
                                        <button type="submit" class="btn btn-primary w-100">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->
                </div>

                <!-- Footer -->
                <footer class="footer text-center">
                    <span class="text-muted">
                        © 2025 PERUMDA AIR MINUM TIRTA MULIA KAB. PEMALANG
                    </span>
                </footer>
            </div>
        </div>
    </div>

    @include('admin.js')
</body>

</html>
