<!doctype html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr"
    data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>
    <style>
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
            
            .two-column-form .col-md-6 {
                width: 100% !important;
            }
        }

        /* Two column form layout */
        .two-column-form .row {
            margin-left: -10px;
            margin-right: -10px;
        }
        
        .two-column-form .col-md-6 {
            padding-left: 10px;
            padding-right: 10px;
        }
        
        /* Image thumbnail sizing */
        .img-thumbnail {
            max-width: 50px;
            height: auto;
        }
        
        /* Modal styling */
        .modal-xl-custom {
            max-width: 1100px;
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

                        <!-- Combined Modal for Add and Edit -->
                        <div class="modal fade" id="modalRabForm" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-xl-custom modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h5 class="modal-title" id="modalRabFormTitle">
                                            <i class="ti ti-file-description me-2"></i>
                                            <span id="modalTitle">Tambah Data RAB</span>
                                        </h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="row g-3 two-column-form" id="form-rab" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" id="rab_id" name="id">
                                            <div id="method-field"></div>
                                            
                                            <div class="col-md-6">
                                                <label class="form-label" for="tanggal">Tanggal</label>
                                                <input type="date" id="tanggal" name="tanggal" class="form-control" required />
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="form-label" for="tanggal_pelaksana">Tanggal Pelaksana</label>
                                                <input type="date" id="tanggal_pelaksana" name="tanggal_pelaksana" class="form-control" required />
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="form-label" for="no_spk">No SPK</label>
                                                <input type="number" id="no_spk" name="no_spk" class="form-control" placeholder="0" required />
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="form-label" for="pekerjaan">Pekerjaan</label>
                                                <input type="text" id="pekerjaan" name="pekerjaan" class="form-control" placeholder="Jenis pekerjaan" required />
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="form-label" for="masa_pemeliharaan">Masa Pemeliharaan</label>
                                                <input type="text" id="masa_pemeliharaan" name="masa_pemeliharaan" class="form-control" placeholder="input data" required />
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="form-label" for="penyedia">Penyedia</label>
                                                <input type="text" id="penyedia" name="penyedia" class="form-control" placeholder="input data" required />
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="form-label" for="vol">Volume (m)</label>
                                                <input type="number" id="vol" name="vol" class="form-control" placeholder="0" required />
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="form-label" for="lokasi">Lokasi</label>
                                                <input type="text" id="lokasi" name="lokasi" class="form-control" placeholder="Lokasi pekerjaan" required />
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="form-label" for="rab">RAB (Rp)</label>
                                                <input type="number" id="rab" name="rab" class="form-control" placeholder="0" required />
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="form-label" for="keterangan">Keterangan</label>
                                                <textarea id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan tambahan" rows="2"></textarea>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="form-label" for="honor">Honor (Rp)</label>
                                                <input type="number" id="honor" name="honor" class="form-control" placeholder="0" />
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="form-label" for="bahan">Bahan (Rp)</label>
                                                <input type="number" id="bahan" name="bahan" class="form-control" placeholder="0" />
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="form-label" for="upah">Upah (Rp)</label>
                                                <input type="number" id="upah" name="upah" class="form-control" placeholder="0" />
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="form-label" for="jumlah">Jumlah (Rp)</label>
                                                <input type="number" id="jumlah" name="jumlah" class="form-control" placeholder="0" />
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="form-label" for="gis">GIS</label>
                                                <input type="text" id="gis" name="gis" class="form-control" placeholder="Data GIS" />
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="form-label" for="file">SPK</label>
                                                <input type="file" id="file" name="file" class="form-control" />
                                                <div id="current-file-container" class="mt-2 d-none">
                                                    <small>File saat ini:</small>
                                                    <div id="current-file" class="mt-1"></div>
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" type="checkbox" id="remove_file" name="remove_file">
                                                        <label class="form-check-label" for="remove_file">
                                                            Hapus file saat ini
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="form-label" for="file2">DED</label>
                                                <input type="file" id="file2" name="file2" class="form-control" />
                                                <div id="current-file2-container" class="mt-2 d-none">
                                                    <small>File saat ini:</small>
                                                    <div id="current-file2" class="mt-1"></div>
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" type="checkbox" id="remove_file2" name="remove_file2">
                                                        <label class="form-check-label" for="remove_file2">
                                                            Hapus file saat ini
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="form-label" for="file3">RAB</label>
                                                <input type="file" id="file3" name="file3" class="form-control" />
                                                <div id="current-file3-container" class="mt-2 d-none">
                                                    <small>File saat ini:</small>
                                                    <div id="current-file3" class="mt-1"></div>
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" type="checkbox" id="remove_file3" name="remove_file3">
                                                        <label class="form-check-label" for="remove_file3">
                                                            Hapus file saat ini
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            <i class="ti ti-x me-1"></i> Batal
                                        </button>
                                        <button type="button" class="btn btn-primary" id="submitRabForm">
                                            <i class="ti ti-check me-1"></i> Simpan
                                        </button>
                                    </div>
                                </div>
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
            // Initialize DataTable
            const table = initializeDataTable();
            
            // Set up event handlers
            setupEventHandlers(table);
            
            // Initialize form submission handler
            initializeFormSubmission(table);
        });
        
        // Initialize DataTable
        function initializeDataTable() {
            return $('#data-divisi-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('data-rab.index') }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'tanggal', name: 'tanggal', render: formatDate },
                    { data: 'tanggal_pelaksana', name: 'tanggal_pelaksana', render: formatDate },
                    { data: 'no_spk', name: 'no_spk' },
                    { data: 'pekerjaan', name: 'pekerjaan' },
                    { data: 'masa_pemeliharaan', name: 'masa_pemeliharaan' },
                    { data: 'penyedia', name: 'penyedia' },
                    { data: 'vol', name: 'vol' },
                    { data: 'lokasi', name: 'lokasi' },
                    { data: 'rab', name: 'rab', render: data => 'Rp ' + data },
                    { data: 'action', name: 'action', orderable: false, searchable: false, render: renderActionButtons }
                ],
                dom: '<"card-header flex-column flex-md-row"<"head-label text-center"><"dt-action-buttons text-end pt-3 pt-md-0"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                buttons: [
                    {
                        text: '<i class="ti ti-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Tambah</span>',
                        className: 'create-new btn btn-primary',
                        action: function() {
                            showRabModal('add');
                        }
                    }
                ],
                responsive: {
                    details: {
                        display: $.fn.dataTable.Responsive.display.modal({
                            header: function(row) {
                                const data = row.data();
                                return 'Detail ' + data.nama_kegiatan;
                            }
                        }),
                        type: 'column',
                        renderer: $.fn.dataTable.Responsive.renderer.tableAll()
                    }
                }
            });
        }
        
        // Format date for display
        function formatDate(data) {
            if (!data) return '-';
            const date = new Date(data);
            const day = String(date.getDate()).padStart(2, '0');
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const year = date.getFullYear();
            return `${day}-${month}-${year}`;
        }
        
        // Render action buttons
        function renderActionButtons(data, type, row) {
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
        
        // Set up event handlers
        function setupEventHandlers(table) {
            $('div.head-label').html('<h5 class="card-title mb-0">Data Rab</h5>');
            
            // Delete record handler
            $(document).on('click', '.delete-record', function() {
                const id = $(this).data('id');
                deleteRecord(id, table);
            });
            
            // Edit record handler
            $(document).on('click', '.edit-record', function() {
                const id = $(this).data('id');
                loadRecordForEdit(id);
            });
            
            // Detail record handler
            $(document).on('click', '.btn-show-detail', function() {
                const id = $(this).data('id');
                showDetailModal(id);
            });
        }
        
        // Initialize form submission
        function initializeFormSubmission(table) {
            $('#submitRabForm').click(function() {
                submitRabForm(table);
            });
        }
        
        // Show RAB modal for add or edit
        function showRabModal(mode, data = null) {
            const modal = $('#modalRabForm');
            const title = mode === 'add' ? 'Tambah Data RAB' : 'Edit Data RAB';
            
            // Set modal title
            $('#modalTitle').text(title);
            $('#modalRabFormTitle').find('i').after(document.createTextNode(title));
            
            // Reset form and set appropriate method
            $('#form-rab')[0].reset();
            $('#method-field').empty();
            $('#rab_id').val('');
            
            if (mode === 'add') {
                $('#method-field').html('@csrf');
            } else {
                $('#method-field').html('@csrf @method("PUT")');
                populateForm(data);
            }
            
            // Hide current file containers initially
            $('[id^="current-file"]').parent().addClass('d-none');
            $('[id^="remove_file"]').prop('checked', false);
            
            modal.modal('show');
        }
        
        // Populate form with data for editing
        function populateForm(data) {
            $('#rab_id').val(data.id);
            $('#tanggal').val(data.tanggal.split(' ')[0]);
            $('#tanggal_pelaksana').val(data.tanggal_pelaksana.split(' ')[0]);
            $('#no_spk').val(data.no_spk);
            $('#pekerjaan').val(data.pekerjaan);
            $('#masa_pemeliharaan').val(data.masa_pemeliharaan);
            $('#penyedia').val(data.penyedia);
            $('#vol').val(data.vol);
            $('#lokasi').val(data.lokasi);
            $('#rab').val(data.rab);
            $('#keterangan').val(data.keterangan);
            $('#honor').val(data.honor);
            $('#bahan').val(data.bahan);
            $('#upah').val(data.upah);
            $('#jumlah').val(data.jumlah);
            $('#gis').val(data.gis);
            
            // Show current files if they exist
            showCurrentFile('file', data.file);
            showCurrentFile('file2', data.file2);
            showCurrentFile('file3', data.file3);
        }
        
        // Show current file in form
        function showCurrentFile(fieldName, fileName) {
            const container = $(`#current-${fieldName}-container`);
            const field = $(`#current-${fieldName}`);
            
            if (fileName) {
                container.removeClass('d-none');
                field.html(`
                    <a href="/storage/file/${fileName}" target="_blank" class="text-truncate d-block">
                        <i class="ti ti-file me-1"></i> ${fileName}
                    </a>
                `);
            } else {
                container.addClass('d-none');
            }
        }
        
        // Load record for editing
        function loadRecordForEdit(id) {
            const url = "{{ route('data-rab.edit', ':id') }}".replace(':id', id);
            
            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    showRabModal('edit', response);
                },
                error: function() {
                    console.error('Gagal memuat data RAB');
                }
            });
        }
        
        // Submit RAB form
        function submitRabForm(table) {
            const formData = new FormData($('#form-rab')[0]);
            const id = $('#rab_id').val();
            const isEdit = !!id;
            const url = isEdit ? 
                "{{ route('data-rab.update', ':id') }}".replace(':id', id) : 
                "{{ route('data-rab.store') }}";
                
            // Show loading state
            const submitBtn = $('#submitRabForm');
            const originalText = submitBtn.html();
            submitBtn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Menyimpan...');
            
            // Show loading SweetAlert
            let swalInstance = Swal.fire({
                title: isEdit ? 'Memperbarui Data' : 'Menyimpan Data',
                html: isEdit ? 'Sedang memperbarui data RAB...' : 'Sedang memproses data RAB...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
            
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#modalRabForm').modal('hide');
                    table.ajax.reload();
                    
                    // Close loading and show success
                    swalInstance.close();
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: response.message || (isEdit ? 'Data berhasil diperbarui' : 'RAB berhasil ditambahkan'),
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
                            text: xhr.responseJSON?.message || 'Terjadi kesalahan. Silakan coba lagi.',
                            confirmButtonText: 'Mengerti'
                        });
                    }
                },
                complete: function() {
                    submitBtn.prop('disabled', false).html(originalText);
                }
            });
        }
        
        // Delete record
        function deleteRecord(id, table) {
            const url = "{{ route('data-rab.destroy', ':id') }}".replace(':id', id);
            
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
                        data: { _token: "{{ csrf_token() }}" },
                        beforeSend: function() {
                            Swal.showLoading();
                        },
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: response.success || 'Data berhasil dihapus',
                                timer: 1500,
                                showConfirmButton: false
                            });
                            table.ajax.reload(null, false);
                        },
                        error: function(xhr) {
                            const errorMsg = xhr.responseJSON?.error || 'Terjadi kesalahan saat menghapus data';
                            Swal.fire('Error!', errorMsg, 'error');
                        }
                    });
                }
            });
        }
        
        // Show detail modal
        function showDetailModal(id) {
            const url = `/data-rab/${id}`;
            
            // Show loading state
            $('#detailContent').html(`
                <div class="text-center py-5">
                    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;"></div>
                    <p class="mt-3">Memuat data RAB...</p>
                </div>
            `);
            
            // Show modal
            $('#modalDetail').modal('show');
            
            // Fetch data
            fetch(url, {
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
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
                
                // Add retry functionality
                $('.retry-load').click(function() {
                    const retryId = $(this).data('id');
                    showDetailModal(retryId);
                });
            });
        }
    </script>
</body>

</html>
