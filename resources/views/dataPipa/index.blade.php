<!doctype html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr"
    data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>
    <style>
        .custom-offcanvas-center {
            top: 50% !important;
            left: 50% !important;
            transform: translate(-50%, -50%) !important;
            width: 600px;
            /* Sesuaikan lebar */
            height: auto;
            /* Atur tinggi sesuai konten */
            border-radius: 8px;
            /* Biar cantik */
        }

        /* Improved mobile responsiveness */
        .card-datatable.table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        /* Mobile optimizations */
        @media (max-width: 767.98px) {
            .dt-action-buttons .btn {
                padding: 0.375rem;
                font-size: 0.75rem;
            }

            .datatables-basic th,
            .datatables-basic td {
                white-space: nowrap;
                padding: 0.5rem;
            }

            .dropdown-menu {
                position: absolute !important;
            }

            .dataTables_length select,
            .dataTables_filter input {
                width: 100% !important;
            }

            .card-header {
                flex-direction: column !important;
                align-items: stretch !important;
            }

            .head-label {
                text-align: center !important;
                margin-bottom: 1rem;
            }

            .dt-action-buttons {
                justify-content: center !important;
                margin-top: 1rem;
            }
        }

        /* Image thumbnail sizing */
        .img-thumbnail {
            max-width: 50px;
            height: auto;
        }
    </style>

    @include('admin.css')
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('admin.sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                @include('admin.navbar')
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Dashboard/</span> Data Pipa</h4>

                        <!-- DataTable with Buttons -->
                        <div class="card">
                            <div class="card-datatable table-responsive pt-0">
                                <table class="datatables-basic table" id="data-divisi-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Deskripsi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <!-- Modal to add new record -->
                        <div class="offcanvas custom-offcanvas-center" id="add-new-record">
                            <div class="offcanvas-header border-bottom">
                                <h5 class="offcanvas-title" id="exampleModalLabel">Tambah Data Pipa</h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body flex-grow-1">
                                <form class="add-new-record pt-0 row g-2" id="form-add-new-record"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="col-sm-12">
                                        <label class="form-label" for="nama">Nama</label>
                                        <input type="text" id="nama" name="nama" class="form-control"
                                            placeholder="Nama Divisi" required />
                                    </div>
                                    <div class="col-sm-12">
                                        <label class="form-label" for="nama">Deskripsi</label>
                                        <textarea id="deskripsi" name="deskripsi" class="form-control" placeholder="Deskripsi" rows="3" required></textarea>
                                    </div>

                                    <div class="col-sm-12 mt-3">
                                        <button type="submit"
                                            class="btn btn-primary data-submit me-sm-3 me-1">Simpan</button>
                                        <button type="reset" class="btn btn-outline-secondary"
                                            data-bs-dismiss="offcanvas">Batal</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!--/ DataTable with Buttons -->

                        <!-- Add Edit Modal -->
                        <div class="offcanvas custom-offcanvas-center" id="edit-record">
                            <div class="offcanvas-header border-bottom">
                                <h5 class="offcanvas-title" id="editModalLabel">Edit Data Pipa</h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body flex-grow-1">
                                <form class="edit-record pt-0 row g-2" id="form-edit-record"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" id="edit_id" name="id">

                                    <div class="col-sm-12">
                                        <label class="form-label" for="edit_nama">Nama</label>
                                        <input type="text" id="edit_nama" name="nama" class="form-control"
                                            required />
                                    </div>
                                    <div class="col-sm-12">
                                        <label class="form-label" for="edit_deskripsi">Deskripsi</label>
                                        <textarea id="edit_deskripsi" name="deskripsi" class="form-control" required></textarea>
                                    </div>

                                    <div class="col-sm-12 mt-3">
                                        <button type="submit"
                                            class="btn btn-primary data-submit me-sm-3 me-1">Update</button>
                                        <button type="reset" class="btn btn-outline-secondary"
                                            data-bs-dismiss="offcanvas">Batal</button>
                                    </div>
                                </form>
                            </div>
                        </div>


                    </div>
                    <!-- / Content -->

                    @include('admin.footer')
                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->
    @include('admin.alert')
    @include('admin.js')

    <script>
        $(document).ready(function() {
            var table = $('#data-divisi-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('data-pipa.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },

                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'deskripsi',
                        name: 'deskripsi'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return `
                                <div class="d-inline-block">
                                    <a href="javascript:;" class="btn btn-sm btn-icon edit-record" data-id="${row.id}">
                                    <i class="ti ti-edit"></i>
                                    </a>
                                    <a href="javascript:;" class="btn btn-sm btn-icon delete-record" data-id="${row.id}">
                                        <i class="ti ti-trash"></i>
                                    </a>
                                </div>
                            `;
                        }
                    }
                ],
                dom: '<"card-header flex-column flex-md-row"<"head-label text-center"><"dt-action-buttons text-end pt-3 pt-md-0"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                buttons: 
                [
                    // {
                    //     extend: 'collection',
                    //     className: 'btn btn-label-primary dropdown-toggle me-2',
                    //     text: '<i class="ti ti-file-export me-sm-1"></i> <span class="d-none d-sm-inline-block">Export</span>',
                    //     buttons: [{
                    //             extend: 'print',
                    //             text: '<i class="ti ti-printer me-1"></i>Print'
                    //         },
                    //         {
                    //             extend: 'csv',
                    //             text: '<i class="ti ti-file-text me-1"></i>Csv'
                    //         },
                    //         {
                    //             extend: 'excel',
                    //             text: '<i class="ti ti-file-spreadsheet me-1"></i>Excel'
                    //         },
                    //         {
                    //             extend: 'pdf',
                    //             text: '<i class="ti ti-file-description me-1"></i>Pdf'
                    //         },
                    //         {
                    //             extend: 'copy',
                    //             text: '<i class="ti ti-copy me-1"></i>Copy'
                    //         }
                    //     ]
                    // },
                    {
                        text: '<i class="ti ti-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Tambah</span>',
                        className: 'create-new btn btn-primary',
                        action: function() {
                            $('#form-add-new-record')[0].reset();
                            $('#add-new-record').offcanvas('show');
                        }
                    }
                ],
                responsive: {
                    details: {
                        display: $.fn.dataTable.Responsive.display.modal({
                            header: function(row) {
                                var data = row.data();
                                return 'Detail ' + data.nama_kegiatan;
                            }
                        }),
                        type: 'column',
                        renderer: $.fn.dataTable.Responsive.renderer.tableAll()
                    }
                }
            });

            $('div.head-label').html('<h5 class="card-title mb-0">Data Pipa</h5>');

            // store
            $('#form-add-new-record').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);

                // Show loading SweetAlert
                let swalInstance = Swal.fire({
                    title: 'Menyimpan Data',
                    html: 'Sedang memproses data kegiatan...',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                $.ajax({
                    url: "{{ route('data-pipa.store') }}",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        $('.data-submit').prop('disabled', true)
                            .html(
                                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Menyimpan...'
                            );
                    },
                    success: function(response) {
                        $('#add-new-record').offcanvas('hide');
                        table.ajax.reload();

                        // Close loading and show success
                        swalInstance.close();
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: response.message || 'Kegiatan berhasil ditambahkan',
                            timer: 2000,
                            showConfirmButton: false,
                            timerProgressBar: true
                        });
                    },
                    error: function(xhr) {
                        // Close loading first
                        swalInstance.close();

                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            let errorMessages = Object.values(errors).map(msg =>
                                `<div>• ${msg}</div>`).join('');

                            Swal.fire({
                                icon: 'error',
                                title: 'Validasi Gagal',
                                html: `<div class="text-start">${errorMessages}</div>`,
                                confirmButtonText: 'Mengerti'
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                text: xhr.responseJSON?.message ||
                                    'Terjadi kesalahan. Silakan coba lagi.',
                                confirmButtonText: 'Mengerti'
                            });
                        }
                    },
                    complete: function() {
                        $('.data-submit').prop('disabled', false).html('Simpan');
                    }
                });
            });

            // destroy
            $(document).on('click', '.delete-record', function() {
                var id = $(this).data('id');
                var url = "{{ route('data-pipa.destroy', ':id') }}".replace(':id', id);

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            beforeSend: function() {
                                Swal.showLoading();
                            },
                            success: function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: response.success ||
                                        'Data berhasil dihapus',
                                    timer: 1500,
                                    showConfirmButton: false
                                });
                                table.ajax.reload(null, false);
                            },
                            error: function(xhr) {
                                let errorMsg = xhr.responseJSON?.error ||
                                    'Terjadi kesalahan saat menghapus data';
                                Swal.fire(
                                    'Error!',
                                    errorMsg,
                                    'error'
                                );
                            }
                        });
                    }
                });
            });
        });


        // Edit record handler - tanpa alert loading dan error
        $(document).on('click', '.edit-record', function() {
            var id = $(this).data('id');
            var url = "{{ route('data-pipa.edit', ':id') }}".replace(':id', id);

            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    // Populate form dengan data response
                    $('#edit_id').val(response.id);
                    $('#edit_nama').val(response.nama);
                    $('#edit_deskripsi').val(response.deskripsi);

                    // Tampilkan file saat ini jika ada
                    if (response.file) {
                        $('#current-file').html(`
                    <small>File saat ini:</small><br>
                    <a href="/storage/file/${response.file}" target="_blank">
                        <img src="/storage/file/${response.file}" width="100" class="img-thumbnail">
                    </a>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" id="remove_file" name="remove_file">
                        <label class="form-check-label" for="remove_file">
                            Hapus file saat ini
                        </label>
                    </div>
                `);
                    } else {
                        $('#current-file').html('<small>Tidak ada file</small>');
                    }

                    $('#edit-record').offcanvas('show');
                },
                error: function() {
                    // Tidak menampilkan alert error
                    console.error('Gagal memuat data kegiatan');
                }
            });
        });

        // Update record handler - dengan auto close modal dan alert
        $('#form-edit-record').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var id = $('#edit_id').val();
            var url = "{{ route('data-pipa.update', ':id') }}".replace(':id', id);
            var $submitBtn = $('.data-submit');
            var $editModal = $('#edit-record');

            // Tambahkan remove_file ke formData jika dicentang
            if ($('#remove_file').is(':checked')) {
                formData.append('remove_file', true);
            }

            // Nonaktifkan tombol submit
            $submitBtn.prop('disabled', true)
                .html('<span class="spinner-border spinner-border-sm"></span> Menyimpan...');

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // Tutup modal terlebih dahulu
                    var bsOffcanvas = bootstrap.Offcanvas.getInstance($editModal[0]);
                    bsOffcanvas.hide();

                    // Tampilkan alert sukses
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: response.message || 'Data berhasil diperbarui',
                        timer: 2000,
                        showConfirmButton: false,
                        timerProgressBar: true,
                        didClose: () => {
                            // Reload tabel setelah alert tertutup
                            $('#data-divisi-table').DataTable().ajax.reload(null, false);
                        }
                    });
                },
                error: function(xhr) {
                    console.error('Error:', xhr.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: xhr.responseJSON?.message ||
                            'Terjadi kesalahan saat menyimpan data',
                        timer: 2000,
                        showConfirmButton: false
                    });
                },
                complete: function() {
                    $submitBtn.prop('disabled', false).html('Update');
                }
            });
        });
    </script>
</body>

</html>
