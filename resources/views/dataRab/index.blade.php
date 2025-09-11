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
                        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Data Rab</h4>

                        <!-- DataTable with Buttons -->
                        <div class="card">
                            <div class="card-datatable table-responsive pt-0">
                                <table class="datatables-basic table" id="data-divisi-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal RAB</th>
                                            <th>Tgl pelaksana</th>
                                            <th>No SPK</th>
                                            <th>Pekerjaan</th>
                                            <th>Masa Pemeliharaan</th>
                                            <th>penyedia</th>
                                            <th>Vol (m)</th>
                                            <th>Lokasi</th>
                                            <th>RAB (Rp)</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>

                        <!-- Modal Detail -->
                        <div class="modal fade" id="modalDetail" tabindex="-1" aria-hidden="true"
                            data-bs-backdrop="static">
                            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h5 class="modal-title">
                                            <i class="ti ti-file-description me-2"></i>
                                            Detail RAB
                                        </h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
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
                                <h5 class="offcanvas-title" id="exampleModalLabel">Tambah Data RAB</h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body flex-grow-1">
                                <form class="add-new-record pt-0 row g-2" id="form-add-new-record"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="col-sm-12">
                                        <label class="form-label" for="tanggal">Tanggal</label>
                                        <input type="date" id="tanggal" name="tanggal" class="form-control"
                                            required />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label" for="tanggal_pelaksana">Tanggal Pelaksana</label>
                                        <input type="date" id="tanggal_pelaksana" name="tanggal_pelaksana" class="form-control"
                                            required />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label" for="no_spk">No SPK</label>
                                        <input type="number" id="no_spk" name="no_spk" class="form-control"
                                            placeholder="0" required />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label" for="pekerjaan">Pekerjaan</label>
                                        <input type="text" id="pekerjaan" name="pekerjaan" class="form-control"
                                            placeholder="Jenis pekerjaan" required />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label" for="masa_pemeliharaan">Masa Pemeliharaan</label>
                                        <input type="text" id="masa_pemeliharaan" name="masa_pemeliharaan" class="form-control"
                                            placeholder="input data" required />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label" for="penyedia">Penyedia</label>
                                        <input type="text" id="penyedia" name="penyedia" class="form-control"
                                            placeholder="input data" required />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label" for="vol">Volume (m)</label>
                                        <input type="number" id="vol" name="vol" class="form-control"
                                            placeholder="0" required />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label" for="lokasi">Lokasi</label>
                                        <input type="text" id="lokasi" name="lokasi" class="form-control"
                                            placeholder="Lokasi pekerjaan" required />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label" for="rab">RAB (Rp)</label>
                                        <input type="number" id="rab" name="rab" class="form-control"
                                            placeholder="0" required />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label" for="keterangan">Keterangan</label>
                                        <textarea id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan tambahan" rows="2"></textarea>
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label" for="honor">Honor (Rp)</label>
                                        <input type="number" id="honor" name="honor" class="form-control"
                                            placeholder="0" />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label" for="bahan">Bahan (Rp)</label>
                                        <input type="number" id="bahan" name="bahan" class="form-control"
                                            placeholder="0" />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label" for="upah">Upah (Rp)</label>
                                        <input type="number" id="upah" name="upah" class="form-control"
                                            placeholder="0" />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label" for="jumlah">Jumlah (Rp)</label>
                                        <input type="number" id="jumlah" name="jumlah" class="form-control"
                                            placeholder="0" />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label" for="gis">GIS</label>
                                        <input type="text" id="gis" name="gis" class="form-control"
                                            placeholder="Data GIS" />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label" for="file">SPK</label>
                                        <input type="file" id="file" name="file" class="form-control" />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label" for="file2">DED</label>
                                        <input type="file" id="file2" name="file2" class="form-control" />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label" for="file3">RAB</label>
                                        <input type="file" id="file3" name="file3" class="form-control" />
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

                        <!-- Modal PDF Viewer -->
                        <div class="modal fade" id="modalPdfViewer" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-centered modal-fullscreen-sm-down">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h5 class="modal-title">
                                            <i class="ti ti-file-text me-2"></i> Preview Lampiran PDF
                                        </h5>
                                        <button type="button" class="btn-close btn-close-white"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body p-0">
                                        <iframe id="pdfIframe" src="" width="100%" height="600px"
                                            style="border: none;"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!--/ DataTable with Buttons -->

                        <!-- Add Edit Modal -->
                        <div class="offcanvas custom-offcanvas-center" id="edit-record">
                            <div class="offcanvas-header border-bottom">
                                <h5 class="offcanvas-title" id="editModalLabel">Edit Data RAB</h5>
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
                                        <label class="form-label" for="edit_tanggal">Tanggal</label>
                                        <input type="date" id="edit_tanggal" name="tanggal" class="form-control"
                                            required />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label" for="edit_tanggal_pelaksana">Tanggal Pelaksana</label>
                                        <input type="date" id="edit_tanggal_pelaksana" name="tanggal_pelaksana" class="form-control"
                                            required />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label" for="edit_no_spk">No SPK</label>
                                        <input type="number" id="edit_no_spk" name="no_spk" class="form-control"
                                            placeholder="0" required />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label" for="edit_pekerjaan">Pekerjaan</label>
                                        <input type="text" id="edit_pekerjaan" name="pekerjaan"
                                            class="form-control" placeholder="Jenis pekerjaan" required />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label" for="edit_masa_pemeliharaan">Masa Pemeliharaan</label>
                                        <input type="text" id="edit_masa_pemeliharaan" name="masa_pemeliharaan"
                                            class="form-control" placeholder="input data" required />
                                    </div>
                                    
                                    <div class="col-sm-12">
                                        <label class="form-label" for="edit_penyedia">Penyedia</label>
                                        <input type="text" id="edit_peneydia" name="peneydia"
                                            class="form-control" placeholder="input data" required />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label" for="edit_vol">Vol (m)</label>
                                        <input type="number" id="edit_vol" name="vol" class="form-control"
                                            placeholder="0" required />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label" for="edit_lokasi">Lokasi</label>
                                        <input type="text" id="edit_lokasi" name="lokasi" class="form-control"
                                            placeholder="Lokasi pekerjaan" required />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label" for="edit_rab">Honor (Rp)</label>
                                        <input type="number" id="edit_honor" name="rab" class="form-control"
                                            placeholder="0" required />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label" for="edit_rab">RAB (Rp)</label>
                                        <input type="number" id="edit_rab" name="rab" class="form-control"
                                            placeholder="0" required />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label" for="edit_keterangan">Keterangan</label>
                                        <textarea id="edit_keterangan" name="keterangan" class="form-control" placeholder="Keterangan tambahan"
                                            rows="2"></textarea>
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label" for="edit_bahan">Bahan (Rp)</label>
                                        <input type="number" id="edit_bahan" name="bahan" class="form-control"
                                            placeholder="0" />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label" for="edit_upah">Upah (Rp)</label>
                                        <input type="number" id="edit_upah" name="upah" class="form-control"
                                            placeholder="0" />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label" for="edit_jumlah">Jumlah (Rp)</label>
                                        <input type="number" id="edit_jumlah" name="jumlah" class="form-control"
                                            placeholder="0" />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label" for="edit_gis">GIS</label>
                                        <input type="text" id="edit_gis" name="gis" class="form-control"
                                            placeholder="Data GIS" />
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label" for="edit_file">File 1</label>
                                        <input type="file" id="edit_file" name="file" class="form-control" />
                                        <small class="text-muted">Biarkan kosong jika tidak ingin mengubah file</small>
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label" for="edit_file2">File 2</label>
                                        <input type="file" id="edit_file2" name="file2" class="form-control" />
                                        <small class="text-muted">Biarkan kosong jika tidak ingin mengubah file</small>
                                    </div>

                                    <div class="col-sm-12">
                                        <label class="form-label" for="edit_file3">File 3</label>
                                        <input type="file" id="edit_file3" name="file3" class="form-control" />
                                        <small class="text-muted">Biarkan kosong jika tidak ingin mengubah file</small>
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
                ajax: "{{ route('data-rab.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'tanggal',
                        name: 'tanggal',
                        render: function(data, type, row) {
                            if (!data) return '-';
                            const date = new Date(data);
                            const day = String(date.getDate()).padStart(2, '0');
                            const month = String(date.getMonth() + 1).padStart(2,
                                '0');
                            const year = date.getFullYear();
                            return `${day}-${month}-${year}`;
                        }
                    },
                    {
                        data: 'tanggal_pelaksana',
                        name: 'tanggal_pelaksana',
                        render: function(data, type, row) {
                            if (!data) return '-';
                            const date = new Date(data);
                            const day = String(date.getDate()).padStart(2, '0');
                            const month = String(date.getMonth() + 1).padStart(2,
                                '0');
                            const year = date.getFullYear();
                            return `${day}-${month}-${year}`;
                        }
                    },
                    {
                        data: 'no_spk',
                        name: 'no_spk'
                    },
                    {
                        data: 'pekerjaan',
                        name: 'pekerjaan'
                    },
                    {
                        data: 'masa_pemeliharaan',
                        name: 'masa_pemeliharaan'
                    },
                    {
                        data: 'penyedia',
                        name: 'penyedia'
                    },
                    {
                        data: 'vol',
                        name: 'vol'
                    },
                    {
                        data: 'lokasi',
                        name: 'lokasi'
                    },
                    {
                        data: 'rab',
                        name: 'rab',
                         render: function(data, type, row) {
                        return 'Rp ' + data;
                        }
},

                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return `
                                <div class="d-inline-block">
                                    <a href="javascript:;" class="btn btn-sm btn-icon btn-show-detail" data-id="${row.id}">
                                    <i class="ti ti-eye"></i>
                                    </a>
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

            $('div.head-label').html('<h5 class="card-title mb-0">Data Rab</h5>');

            // store
            $('#form-add-new-record').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);

                // Show loading SweetAlert
                let swalInstance = Swal.fire({
                    title: 'Menyimpan Data',
                    html: 'Sedang memproses data RAB...',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                $.ajax({
                    url: "{{ route('data-rab.store') }}",
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
                            text: response.message || 'RAB berhasil ditambahkan',
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
                var url = "{{ route('data-rab.destroy', ':id') }}".replace(':id', id);

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
            var url = "{{ route('data-rab.edit', ':id') }}".replace(':id', id);

            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    // Populate form dengan data response
                    $('#edit_id').val(response.id);
                    $('#edit_tanggal').val(response.tanggal.split(' ')[0]); // format date (yyyy-mm-dd)
                    $('#edit_tanggal_pelaksana').val(response.tanggal.split(' ')[0]); // format date (yyyy-mm-dd)
                    $('#edit_no_spk').val(response.no_spk);
                    $('#edit_pekerjaan').val(response.pekerjaan);
                    $('#edit_masa_pemeliharaan').val(response.masa_pemeliharaan);
                    $('#edit_penyedia').val(response.penyedia);
                    $('#edit_vol').val(response.vol);
                    $('#edit_lokasi').val(response.lokasi);
                    $('#edit_rab').val(response.rab);
                    $('#edit_keterangan').val(response.keterangan);
                    $('#edit_honor').val(response.honor);
                    $('#edit_bahan').val(response.bahan);
                    $('#edit_upah').val(response.upah);
                    $('#edit_jumlah').val(response.jumlah);
                    $('#edit_gis').val(response.gis);

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
                    console.error('Gagal memuat data RAB');
                }
            });
        });

        // Update record handler - hanya tampilkan alert sukses
        $('#form-edit-record').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var id = $('#edit_id').val();
            var url = "{{ route('data-rab.update', ':id') }}".replace(':id', id);

            // Tambahkan remove_file ke formData jika dicentang
            if ($('#remove_file').is(':checked')) {
                formData.append('remove_file', true);
            }

            // Nonaktifkan tombol submit
            $('.data-submit').prop('disabled', true)
                .html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Menyimpan...'
                );

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        // Hanya tampilkan alert sukses
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: 'Data berhasil diperbarui',
                            timer: 1500,
                            showConfirmButton: false,
                            timerProgressBar: true
                        }).then(() => {
                            $('#edit-record').offcanvas('hide');
                            $('#data-divisi-table').DataTable().ajax.reload(null, false);
                        });
                    }
                },
                error: function() {
                    // Tidak menampilkan alert error
                    console.error('Gagal memperbarui data');
                },
                complete: function() {
                    $('.data-submit').prop('disabled', false).html('Update');
                }
            });
        });

        // modal detail
        $(document).on('click', '.btn-show-detail', function() {
            const button = $(this);
            const id = button.data('id');
            const url = `/data-rab/${id}`;

            // Show loading state
            $('#detailContent').html(`
        <div class="text-center py-5">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;"></div>
            <p class="mt-3">Memuat data RAB...</p>
        </div>
    `);

            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('modalDetail'));
            modal.show();

            // Fetch data with proper error handling
            fetch(url, {
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest' // Fixed typo (was X-Requested-Width)
                    }
                })
                .then(async response => {
                    if (!response.ok) {
                        const errorData = await response.json();
                        throw new Error(errorData.message || 'Gagal memuat data');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.status === 'success') {
                        $('#detailContent').html(data.html);
                    } else {
                        throw new Error(data.message || 'Respon tidak valid');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    $('#detailContent').html(`
            <div class="alert alert-danger mx-3 mt-3">
                <i class="ti ti-alert-circle me-2"></i>
                ${error.message}
                <button class="btn btn-sm btn-outline-danger mt-2 retry-load" data-id="${id}">
                    <i class="ti ti-reload me-1"></i> Coba Lagi
                </button>
            </div>
        `);
                });
        });
    </script>
</body>

</html>
