<!doctype html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr"
    data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>
    <style>
        /* Improved mobile responsiveness */
        .custom-modal-center {
            top: 50% !important;
            left: 50% !important;
            transform: translate(-50%, -50%) !important;
            width: 600px;
            height: auto;
            border-radius: 8px;
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
                        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Dashboard/</span> Data Jaringan Baru</h4>

                        <!-- DataTable dengan Tombol -->
                        <div class="card">
                            <div class="card-datatable table-responsive pt-0">
                                <table class="datatables-basic table" id="data-jaringan-baru-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Divisi</th>
                                            <th>Volume(M)</th>
                                            <th>Diameter (inchi)</th>
                                            <th>Pekerjaan</th>
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
                                            Detail Jaringan Baru
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

                        <!-- Unified Modal for Add/Edit -->
                        <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="formModalLabel">Tambah Data Jaringan Baru</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="unified-form pt-0 row g-2" id="form-jaringan" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" id="form_id" name="id">
                                            <input type="hidden" id="form_method" name="_method" value="">
                                            <div class="col-sm-6">
                                                <label class="form-label" for="form_tanggal">Tanggal <span class="text-danger">*</span></label>
                                                <input type="date" id="form_tanggal" name="tanggal" class="form-control" required />
                                            </div>

                                            <div class="col-sm-6">
                                                <label class="form-label" for="form_pekerjaan">Pekerjaan <span class="text-danger">*</span></label>
                                                <input type="text" id="form_pekerjaan" name="pekerjaan" class="form-control"
                                                    placeholder="Jenis pekerjaan" required />
                                            </div>

                                            <!-- Divisi Selection -->
                                            <div class="col-sm-6">
                                                <label class="form-label" for="form_divisi">Divisi <span class="text-danger">*</span></label>
                                                <select id="form_divisi" name="divisi" class="form-select" required>
                                                    <option value="">-- pilih divisi --</option>
                                                    @foreach ($divisis as $divisi)
                                                        <option value="{{ $divisi->id }}">{{ $divisi->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                           

                                            <div class="col-sm-6">
                                                <label class="form-label" for="form_koordinat">Koordinat <span class="text-danger">*</span></label>
                                                <input type="text" id="form_koordinat" name="koordinat" class="form-control" placeholder="0" required />
                                            </div>

                                             <div class="col-sm-6" id="volume-container" >
                                                <label class="form-label" for="form_vol">Vol (m) <span class="text-danger">*</span></label>
                                                <div class="input-group mb-2 volume-entry">
                                                    <input type="number" name="vol[]" class="form-control" placeholder="0" required />
                                                    <button type="button" class="btn btn-success " id="btn-add-volume"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>


                                            <div class="col-sm-6">
                                                <label class="form-label" for="form_lokasi">Lokasi <span class="text-danger">*</span></label>
                                                <input type="text" id="form_lokasi" name="lokasi" class="form-control"
                                                    placeholder="Lokasi pekerjaan" required />
                                            </div>

                                            <!-- Pipa Selection -->
                                            <div class="col-sm-6">
                                                <label class="form-label" for="form_jenis_pipa">PIPA <span class="text-danger">*</span></label>
                                                <div class="select2-primary">
                                                    <select id="form_jenis_pipa" name="jenis_pipa[]" class="form-select select2 " required multiple>
                                                        <option value="">-- pilih jenis pipa --</option>
                                                        @foreach ($pipas as $pipa)
                                                            <option value="{{ $pipa->id }}">{{ $pipa->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Diameter-->
                                            <div class="col-sm-6">
                                                <label class="form-label" for="form_diameter">DN (inchi) <span class="text-danger">*</span></label>
                                                 <div class="select2-primary">
                                                     <select id="form_diameter" name="diameter[]" class="form-select select2 " multiple required>
                                                         <option value="">-- pilih diameter --</option>
                                                         @foreach ($diameters as $diameter)
                                                             <option value="{{ $diameter->id }}">{{ $diameter->nama }}</option>
                                                         @endforeach
                                                     </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <label class="form-label" for="form_keterangan">Keterangan</label>
                                                <textarea id="form_keterangan" name="keterangan" class="form-control" placeholder="Keterangan " rows="2"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" form="form-jaringan" class="btn btn-primary" id="submitBtn">Simpan</button>
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
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

    <div class="div-loading">
      <div id="loader" style="display: none;"></div>
    </div>
    <!-- / Layout wrapper -->
    @include('admin.alert')
    @include('admin.js')

    <script>
        let table;
        let currentMode = 'add'; // 'add' or 'edit'

        $(document).ready(function() {
            initDataTable();
            setupEventHandlers();

             $('#form_diameter').wrap('<div class="position-relative"></div>').select2({
                placeholder: '-- pilih diameter --',
                dropdownParent: $('#form_diameter').parent()
            });
            $('#form_diameter').val(null).trigger('change');
            $('#form_jenis_pipa').wrap('<div class="position-relative"></div>').select2({
                placeholder: '-- pilih jenis pipa --',
                dropdownParent: $('#form_jenis_pipa').parent()
            });
            $('#form_jenis_pipa').val(null).trigger('change');
            $("#btn-add-volume").click(function() {
                const volumeInput = `
                    <div class="input-group mb-2 volume-entry">
                        <input type="number" name="vol[]" class="form-control" placeholder="0" required />
                        <button type="button" class="btn btn-danger btn-remove-volume"><i class="fa fa-minus"></i></button>
                    </div>
                `;
                $("#volume-container").append(volumeInput);
            });

            $(document).on('click', '.btn-remove-volume', function() {
                $(this).closest('.volume-entry').remove();
            });
        });

        function initDataTable() {
            table = $('#data-jaringan-baru-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{{ route('data-jaringan-baru.index') }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    {
                        data: 'tanggal',
                        name: 'tanggal',
                        render: function(data) {
                            if (!data) return '-';
                            const date = new Date(data);
                            return `${String(date.getDate()).padStart(2, '0')}-${String(date.getMonth() + 1).padStart(2, '0')}-${date.getFullYear()}`;
                        }
                    },
                    { data: 'divisi', name: 'divisi' },
                    { data: 'volume', name: 'volume' },
                    { data: 'diameter', name: 'diameter' },
                    { data: 'pekerjaan', name: 'pekerjaan' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],

                dom: '<"card-header flex-column flex-md-row"<"head-label text-center"><"dt-action-buttons text-end pt-3 pt-md-0"B>><"row"<"col-sm-6 col-md-6"l><"col-sm-6 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-6 col-md-6"i><"col-sm-6 col-md-6"p>>',
                buttons: [{
                    text: '<i class="ti ti-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Tambah</span>',
                    className: 'create-new btn btn-primary',
                    action: function() {
                        openModal('add');
                    }
                }],
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

            $('div.head-label').html('<h5 class="card-title mb-0">Data Jaringan Baru</h5>');
        }

        function setupEventHandlers() {
            // Form submit handler
            $('#form-jaringan').on('submit', handleFormSubmit);

            // Edit button handler
            $(document).on('click', '.edit-record', function() {
                const id = $(this).data('id');
                openModal('edit', id);
            });

            // Delete button handler
            $(document).on('click', '.delete-record', handleDelete);

            // Detail button handler
            $(document).on('click', '.btn-show-detail', handleShowDetail);

            // Retry handler for detail modal
            $(document).on('click', '.retry-load', function() {
                const id = $(this).data('id');
                loadDetail(id);
            });
        }

        function openModal(mode, id = null) {
            currentMode = mode;
            resetForm();
            
            if (mode === 'add') {
                $('#formModalLabel').text('Tambah Data Jaringan Baru');
                $('#form_method').val('');
                $('#submitBtn').text('Simpan');
            } else if (mode === 'edit') {
                $('#formModalLabel').text('Edit Data Jaringan Baru');
                $('#form_method').val('PUT');
                $('#submitBtn').text('Update');
                loadEditData(id);
            }
            
            $('#formModal').modal('show');
        }

        function resetForm() {
            $('#form-jaringan')[0].reset();
            $('#form_id').val('');
            $('#form_method').val('');
        }

        function loadEditData(id) {
            const url = "{{ route('data-jaringan-baru.edit', ':id') }}".replace(':id', id);
            
            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    populateForm(response);
                },
                error: function() {
                    showAlert('error', 'Gagal memuat data');
                }
            });
        }

        function populateForm(data) {
            $('#form_id').val(data.id);
            $('#form_tanggal').val(data.tanggal.split(' ')[0]);
            $('#form_pekerjaan').val(data.pekerjaan);
            $('#form_divisi').val(data.divisi_id);
            $('#form_koordinat').val(data.koordinat);
            $('#form_lokasi').val(data.lokasi);
            $('#form_keterangan').val(data.keterangan);
            $("#volume-container").html('<label class="form-label" for="form_vol">Vol (m) <span class="text-danger">*</span></label>');
            data.volume_jaringan.forEach((v,i) => {
                const volumeInput = `
                    <div class="input-group mb-2 volume-entry">
                        <input type="number" name="vol[]" class="form-control" value="${v.volume}" required />
                        ${i === 0 ? 
                            '<button type="button" class="btn btn-success " id="btn-add-volume"><i class="fa fa-plus"></i></button>' :
                            '<button type="button" class="btn btn-danger btn-remove-volume"><i class="fa fa-minus"></i></button>'}
                    </div>
                `;
                $("#volume-container").append(volumeInput);
            });
            let diameter = data.diameter_jaringan.map(d => d.diameter.toString());
            $('#form_diameter').val(diameter).trigger('change');
            let jenis_pipa = data.jenis_pipa_jaringan.map(p => p.jenis_pipa.toString());
            $('#form_jenis_pipa').val(jenis_pipa).trigger('change');
        }

        function handleFormSubmit(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const isEdit = currentMode === 'edit';
            const id = $('#form_id').val();
            
            let url, method;
            if (isEdit) {
                url = "{{ route('data-jaringan-baru.update', ':id') }}".replace(':id', id);
                method = 'POST'; // Laravel akan menggunakan _method untuk PUT
            } else {
                url = "{{ route('data-jaringan-baru.store') }}";
                method = 'POST';
            }

            const $submitBtn = $('#submitBtn');
            const originalText = $submitBtn.text();

            // Show loading state
            showLoadingAlert(isEdit ? 'Memperbarui data...' : 'Menyimpan data...');
            $submitBtn.prop('disabled', true).html(
                '<span class="spinner-border spinner-border-sm me-1"></span>' + 
                (isEdit ? 'Memperbarui...' : 'Menyimpan...')
            );

            $.ajax({
                url: url,
                type: method,
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#formModal').modal('hide');
                    table.ajax.reload(null, false);
                    
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: response.message || (isEdit ? 'Data berhasil diperbarui' : 'Data berhasil disimpan'),
                        timer: 2000,
                        showConfirmButton: false,
                        timerProgressBar: true
                    });
                },
                error: function(xhr) {
                    handleFormError(xhr);
                },
                complete: function() {
                    $submitBtn.prop('disabled', false).text(originalText);
                }
            });
        }

        function handleDelete() {
            const id = $(this).data('id');
            const url = "{{ route('data-jaringan-baru.destroy', ':id') }}".replace(':id', id);

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
                    performDelete(url);
                }
            });
        }

        function performDelete(url) {
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

        function handleShowDetail() {
            const id = $(this).data('id');
            loadDetail(id);
            $('#modalDetail').modal('show');
        }

        function loadDetail(id) {
            const url = `/data-jaringan-baru/${id}`;
            
            // Show loading state
            $('#detailContent').html(`
                <div class="text-center py-5">
                    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;"></div>
                    <p class="mt-3">Memuat data Jaringan Baru...</p>
                </div>
            `);

            fetch(url, {
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(async response => {
                const data = await response.json();
                if (!response.ok) throw new Error(data.message || 'Failed to load data');
                return data;
            })
            .then(data => {
                if (data.status === 'success') {
                    $('#detailContent').html(data.html);
                } else {
                    throw new Error(data.message || 'Invalid response');
                }
            })
            .catch(error => {
                $('#detailContent').html(`
                    <div class="alert alert-danger mx-3 mt-3">
                        <i class="ti ti-alert-circle me-2"></i>
                        ${error.message || 'Server error'}
                        <button class="btn btn-sm btn-outline-danger mt-2 retry-load" data-id="${id}">
                            <i class="ti ti-reload me-1"></i> Coba Lagi
                        </button>
                    </div>
                `);
            });
        }

        // Utility functions
        function showLoadingAlert(message) {
            Swal.fire({
                title: 'Processing',
                html: message,
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
        }

        function showAlert(type, message) {
            Swal.fire({
                icon: type,
                title: type === 'success' ? 'Berhasil!' : 'Error!',
                text: message,
                timer: 2000,
                showConfirmButton: false
            });
        }

        function handleFormError(xhr) {
            Swal.close();
            
            if (xhr.status === 422) {
                const errors = xhr.responseJSON.errors;
                const errorMessages = Object.values(errors).map(msg => `<div>• ${msg}</div>`).join('');
                
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
        }
    </script>
</body>

</html>
