<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Optimized Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-3qF0TF+B7MEkh5XHZRshpRBBtZC+i7H/CNsKTeRYaeNS4W6pQ7p4ByOaN5SvM7Zkfg9ZxeMJx8vUAbq9Z0J0+Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                                    <h5>Dashboard > Edit Permission</h5>
                                </div>
                                <div class="col-12 col-xl-4">
                                    <div class="justify-content-end d-flex">
                                        <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                            <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button"
                                                id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="true">
                                                <i class="fa-solid fa-calendar mr-2"></i>{{ \Carbon\Carbon::now()->format('d M Y') }}
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

                    <!-- CARD FORM ROLE -->
                    <div class="row">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <p class="card-title">Edit Form Permission</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <form method="POST" action="{{ route('permission.update', $permission->id) }}">
                                                @csrf
                                                @method('PUT') <!-- Gunakan method PUT untuk update -->

                                                <!-- Field Name -->
                                                <div class="row mb-4">
                                                    <div class="col">
                                                        <div class="form-outline">
                                                            <label for="name" class="form-label">Name:</label>
                                                            <input value="{{ old('name', $permission->name) }}" type="text"
                                                                class="form-control" name="name" id="name" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Submit button -->
                                                <button type="submit" class="btn btn-primary btn-block mb-4">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Form -->
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->
                </div>

                <!-- Footer -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
                            © 2025 PERUMDA AIR MINUM TIRTA MULIA KAB. PEMALANG
                        </span>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    @include('admin.js')
</body>

</html>
