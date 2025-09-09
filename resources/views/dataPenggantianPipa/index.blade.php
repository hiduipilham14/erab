<!doctype html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr"
    data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>
    <style>
        /* Improved mobile responsiveness */
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
                        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Dashboard/</span> Data Penggantian Pipa
                        </h4>

                        <!-- DataTable with Buttons -->
                        <div class="card">
                            <div class="card-datatable table-responsive pt-0">
                                <table class="datatables-basic table" id="data-penggantian-pipa-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Divisi</th>
                                            <th>Lokasi</th>
                                            <th>DN Lama (inchi)</th>
                                            <th>DN Baru (inchi)</th>
                                            <th>Vol Lama (m)</th>
                                            <th>Vol Baru (m)</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>

                        <!-- Modal Detail -->
                        <div class="modal fade" id="modalDetail" tabindex="-1" aria-hidden="true"
                            data-bs-backdrop="static">
                            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">
                                            <i class="ti ti-file-description me-2"></i>
                                            Detail Penggantian Pipa
                                        </h5>
                                        <button type="button" class="btn-close " data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" id="detailContent">
                                        <!-- Content will be loaded here -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            <i class="ti ti-x me-1"></i> Tutup
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal to add new record -->
                        <div class="offcanvas custom-offcanvas-center" id="add-new-record">
                            <div class="offcanvas-header border-bottom">
                                <h5 class="offcanvas-title">Tambah Data Penggantian Pipa</h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body flex-grow-1">
                                <form class="add-new-record pt-0 row g-2" id="form-add-new-record"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="col-sm-12">
                                        <label class="form-label">Tanggal</label>
                                        <input type="date" name="tanggal" class="form-control" required />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label">Divisi</label>
                                        <select name="divisi" class="form-select" required>
                                            <option value="">-- pilih divisi --</option>
                                            @foreach ($divisis as $divisi)
                                                <option value="{{ $divisi->id }}">{{ $divisi->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label">Pipa Lama</label>
                                        <select name="pipa_lama" class="form-select" required>
                                            <option value="">-- pilih Pipa --</option>
                                            @foreach ($pipas as $pipa)
                                                <option value="{{ $pipa->id }}">{{ $pipa->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label">Pipa Baru</label>
                                        <select name="pipa_baru" class="form-select" required>
                                            <option value="">-- pilih pipa --</option>
                                            @foreach ($pipas as $pipa)
                                                <option value="{{ $pipa->id }}">{{ $pipa->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label">DN Lama</label>
                                        <select name="dn_lama" class="form-select" required>
                                            <option value="">-- pilih diameter --</option>
                                            @foreach ($diameters as $diameter)
                                                <option value="{{ $diameter->id }}">{{ $diameter->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label">DN Baru</label>
                                        <select name="dn_baru" class="form-select" required>
                                            <option value="">-- pilih diameter --</option>
                                            @foreach ($diameters as $diameter)
                                                <option value="{{ $diameter->id }}">{{ $diameter->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label">Tahun Pemasangan Lama</label>
                                        <input type="text" name="th_pemasangan_lama" class="form-control" required />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label">Tahun Pemasangan Baru</label>
                                        <input type="text" name="th_pemasangan_baru" class="form-control" required />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label">Koordinat</label>
                                        <input type="text" name="koordinat" class="form-control" required />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label">Vol (m) Lama</label>
                                        <input type="text" name="vol_lama" class="form-control" required />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label">Vol (m) Baru</label>
                                        <input type="text" name="vol_baru" class="form-control" required />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label">Lokasi</label>
                                        <input type="text" name="lokasi" class="form-control" required />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label">Keterangan</label>
                                        <textarea name="keterangan" class="form-control" rows="2" required></textarea>
                                    </div>

                                    <div class="col-sm-12 mt-3">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <button type="reset" class="btn btn-outline-secondary"
                                            data-bs-dismiss="offcanvas">Batal</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!--/ DataTable with Buttons -->
                        <!-- Modal edit record -->
                        <div class="offcanvas custom-offcanvas-center" id="edit-record">
                            <div class="offcanvas-header border-bottom">
                                <h5 class="offcanvas-title">Edit Data Penggantian Pipa</h5>
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
                                        <label class="form-label">Tanggal</label>
                                        <input type="date" id="edit_tanggal" name="tanggal" class="form-control"
                                            required />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label">Divisi</label>
                                        <select id="edit_divisi" name="divisi" class="form-select" required>
                                            <option value="">-- pilih divisi --</option>
                                            @foreach ($divisis as $divisi)
                                                <option value="{{ $divisi->id }}">{{ $divisi->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label">Pipa Lama</label>
                                        <select id="edit_pipa_lama" name="pipa_lama" class="form-select" required>
                                            <option value="">-- pilih pipa --</option>
                                            @foreach ($pipas as $pipa)
                                                <option value="{{ $pipa->id }}">{{ $pipa->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label">Pipa Baru</label>
                                        <select id="edit_pipa_baru" name="pipa_baru" class="form-select" required>
                                            <option value="">-- pilih pipa --</option>
                                            @foreach ($pipas as $pipa)
                                                <option value="{{ $pipa->id }}">{{ $pipa->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label">DN (inchi) Lama</label>
                                        <select id="edit_dn_lama" name="dn_lama" class="form-select" required>
                                            <option value="">-- pilih diameter --</option>
                                            @foreach ($diameters as $diameter)
                                                <option value="{{ $diameter->id }}">{{ $diameter->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label">DN (inchi) Baru</label>
                                        <select id="edit_dn_baru" name="dn_baru" class="form-select" required>
                                            <option value="">-- pilih diameter --</option>
                                            @foreach ($diameters as $diameter)
                                                <option value="{{ $diameter->id }}">{{ $diameter->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label">Th Pemasangan Lama</label>
                                        <input type="text" id="edit_th_pemasangan_lama" name="th_pemasangan_lama"
                                            class="form-control" required />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label">Th Pemasangan Baru</label>
                                        <input type="text" id="edit_th_pemasangan_baru" name="th_pemasangan_baru"
                                            class="form-control" required />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label">Koordinat</label>
                                        <input type="text" id="edit_koordinat" name="koordinat"
                                            class="form-control" required />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label">Vol (m) Lama</label>
                                        <input type="text" id="edit_vol_lama" name="vol_lama"
                                            class="form-control" required />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label">Vol (m) Baru</label>
                                        <input type="text" id="edit_vol_baru" name="vol_baru"
                                            class="form-control" required />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label">Lokasi</label>
                                        <input type="text" id="edit_lokasi" name="lokasi" class="form-control"
                                            required />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label">Keterangan</label>
                                        <textarea id="edit_keterangan" name="keterangan" class="form-control" rows="2" required></textarea>
                                    </div>

                                    <div class="col-sm-12 mt-3">
                                        <button type="submit" class="btn btn-primary">Update</button>
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
            var table = $('#data-penggantian-pipa-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('data-penggantian-pipa.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'tanggal',
                        name: 'tanggal',
                        render: function(data) {
                            if (!data) return '-';
                            const date = new Date(data);
                            return `${String(date.getDate()).padStart(2, '0')}-${String(date.getMonth() + 1).padStart(2, '0')}-${date.getFullYear()}`;
                        }
                    },
                    {
                        data: 'divisi', // sesuaikan dengan addColumn('divisi', ...)
                        name: 'divisi'
                    },
                    {
                        data: 'lokasi',
                        name: 'lokasi'
                    },
                    {
                        data: 'dn_lama',
                        name: 'dn_lama'
                    },
                    {
                        data: 'dn_baru',
                        name: 'dn_baru'
                    },
                    {
                        data: 'vol_lama',
                        name: 'vol_lama'
                    },
                    {
                        data: 'vol_baru',
                        name: 'vol_baru'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
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

            $('div.head-label').html('<h5 class="card-title mb-0">Data Penggantian Pipa</h5>');

            // store
            $('#form-add-new-record').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);

                // Show loading SweetAlert
                let swalInstance = Swal.fire({
                    title: 'Menyimpan Data',
                    html: 'Sedang memproses data Penggantian Pipa...',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                $.ajax({
                    url: "{{ route('data-penggantian-pipa.store') }}",
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
                            text: response.message ||
                                'Data Penggantian Pipa berhasil ditambahkan',
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
                var url = "{{ route('data-penggantian-pipa.destroy', ':id') }}".replace(':id', id);

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
            var url = "{{ route('data-penggantian-pipa.edit', ':id') }}".replace(':id', id);

            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    // Populate form dengan data response
                    $('#edit_id').val(response.id);
                    $('#edit_tanggal').val(response.tanggal.split(' ')[0]); // format tanggal
                    $('#edit_divisi').val(response.divisi).change();
                    $('#edit_pipa_lama').val(response.pipa_lama).change();
                    $('#edit_pipa_baru').val(response.pipa_baru).change();
                    $('#edit_dn_lama').val(response.dn_lama).change();
                    $('#edit_dn_baru').val(response.dn_baru).change();
                    $('#edit_th_pemasangan_lama').val(response.th_pemasangan_lama);
                    $('#edit_th_pemasangan_baru').val(response.th_pemasangan_baru);
                    $('#edit_koordinat').val(response.koordinat);
                    $('#edit_vol_lama').val(response.vol_lama);
                    $('#edit_vol_baru').val(response.vol_baru);
                    $('#edit_lokasi').val(response.lokasi);
                    $('#edit_keterangan').val(response.keterangan);
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
                    console.error('Gagal memuat data Penggantian Pipa');
                }
            });
        });

        // Update record handler with dynamic table update
        $('#form-edit-record').submit(function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const id = $('#edit_id').val();
            const url = "{{ route('data-penggantian-pipa.update', ':id') }}".replace(':id', id);
            const $submitBtn = $(this).find('.data-submit');
            const $editModal = $('#edit-record');
            const dataTable = $('#data-penggantian-pipa-table').DataTable();

            // Add remove_file flag if checked
            if ($('#remove_file').is(':checked')) {
                formData.append('remove_file', true);
            }

            // Disable submit button during processing
            $submitBtn.prop('disabled', true)
                .html('<span class="spinner-border spinner-border-sm"></span> Menyimpan...');

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // 1. Close the modal immediately
                    bootstrap.Offcanvas.getInstance($editModal[0]).hide();

                    // 2. Update the specific row in DataTable
                    try {
                        const row = dataTable.row(`#row_${id}`);
                        if (row.length) {
                            // Update existing row data
                            row.data(response.data).draw(false);
                        } else {
                            // If row not found, reload the table (fallback)
                            dataTable.ajax.reload(null, false);
                        }
                    } catch (e) {
                        console.error('Row update error:', e);
                        dataTable.ajax.reload(null, false);
                    }

                    // 3. Show success notification
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: response.message || 'Data berhasil diperbarui',
                        timer: 1500,
                        showConfirmButton: false,
                        timerProgressBar: true
                    });
                },
                error: function(xhr) {
                    console.error('Update error:', xhr.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: xhr.responseJSON?.message ||
                            'Terjadi kesalahan saat menyimpan data',
                        confirmButtonText: 'Mengerti'
                    });
                },
                complete: function() {
                    $submitBtn.prop('disabled', false).html('Update');
                }
            });
        });

        // show modal
        $(document).on('click', '.btn-show-detail', function() {
            const button = $(this);
            const id = button.data('id');
            const url = `/data-penggantian-pipa/${id}`;
            const $detailContent = $('#detailContent');
            const modal = new bootstrap.Modal('#modalDetail');

            // Clear previous content and show loading
            $detailContent.html(`
        <div class="text-center py-5">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;"></div>
            <p class="mt-3">Memuat data Penggantian Pipa...</p>
        </div>
    `);
            modal.show();

            // Add cache-busting parameter
            const cacheBuster = '?_=' + new Date().getTime();

            fetch(url + cacheBuster, {
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        'Cache-Control': 'no-cache'
                    },
                    cache: 'no-store'
                })
                .then(async response => {
                    if (!response.ok) {
                        const error = await response.json();
                        throw new Error(error.message || 'Gagal memuat data');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.status === 'success') {
                        $detailContent.html(data.html);
                    } else {
                        throw new Error(data.message || 'Respon tidak valid');
                    }
                })
                .catch(error => {
                    console.error('Fetch error:', error);
                    $detailContent.html(`
            <div class="alert alert-danger mx-3 mt-3">
                <i class="ti ti-alert-circle me-2"></i>
                ${error.message || 'Gagal memuat data. Silakan coba lagi.'}
                <button class="btn btn-sm btn-outline-danger mt-2 retry-load" data-id="${id}">
                    <i class="ti ti-reload me-1"></i> Coba Lagi
                </button>
            </div>
        `);
                });
        });

        // Retry handler with cache busting
        $(document).on('click', '.retry-load', function() {
            const id = $(this).data('id');
            $(this).closest('.alert').replaceWith(`
        <div class="text-center py-5">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;"></div>
            <p class="mt-3">Memuat ulang data...</p>
        </div>
    `);
            $(`.btn-show-detail[data-id="${id}"]`).trigger('click');
        });
    </script>
</body>

</html>
