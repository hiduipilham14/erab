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
                        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Data Update GIS</h4>

                        <!-- DataTable dengan Tombol
 -->
                        <div class="card">
                            <div class="card-datatable table-responsive pt-0">
                                <table class="datatables-basic table" id="data-divisi-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Divisi</th>
                                            <th>Pekerjaan</th>
                                            <th>Vol (m)</th>
                                            <th>Lokasi</th>
                                            <th>Koordinat</th>
                                            <th>Pipa GIS</th>
                                            <th>Pipa LAP</th>
                                            <th>Action</th>
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
                                    <div class=" modal-header">
                                        <h5 class="modal-title">
                                            <i class="ti ti-file-description me-2"></i>
                                            Detail Update GIS
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
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

                        <!-- Modal tambah data -->
                        <div class="offcanvas custom-offcanvas-center" id="add-new-record">
                            <div class="offcanvas-header border-bottom">
                                <h5 class="offcanvas-title" id="exampleModalLabel">Tambah Data Update GIS</h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body flex-grow-1">
                                <form class="add-new-record pt-0 row g-2" id="form-add-new-record"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="col-sm-12">
                                        <label class="form-label" for="tanggal">Tanggal <span
                                                class="text-danger">*</span></label>
                                        <input type="date" id="tanggal" name="tanggal" class="form-control"
                                            required />
                                    </div>

                                    <!-- Divisi Selection -->
                                    <div class="col-sm-12">
                                        <label class="form-label" for="divisi_id">Divisi <span
                                                class="text-danger">*</span></label>
                                        <select id="divisi_id" name="divisi_id" class="form-select" required>
                                            <option value=""> -- pilih divisi --</option>
                                            @foreach ($divisis as $divisi)
                                                <option value="{{ $divisi->id }}">{{ $divisi->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Activity Field -->
                                    <div class="col-sm-12">
                                        <label class="form-label" for="kegiatan">Kegiatan <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="kegiatan" name="kegiatan" class="form-control"
                                            placeholder="Nama kegiatan" required />
                                    </div>

                                    <!-- Coordinate Field -->
                                    <div class="col-sm-12">
                                        <label class="form-label" for="koordinat">Koordinat <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="koordinat" name="koordinat" class="form-control"
                                            placeholder="0" required />
                                    </div>

                                    <!-- Volume Field -->
                                    <div class="col-sm-12">
                                        <label class="form-label" for="vol">Vol (m) <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="vol" name="vol" class="form-control"
                                            placeholder="0" required />
                                    </div>

                                    <!-- Gate Valve GIS Selection -->
                                    <div class="col-sm-12">
                                        <label class="form-label" for="gate_valve_gis">Gate Valve (GIS) <span
                                                class="text-danger">*</span></label>
                                        <select id="gate_valve_gis" name="gate_valve_gis" class="form-select"
                                            required>
                                            <option value="">-- pipih diameter --</option>
                                            @foreach ($diameters as $diameter)
                                                <option value="{{ $diameter->id }}">{{ $diameter->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Gate Valve Lapangan Selection -->
                                    <div class="col-sm-12">
                                        <label class="form-label" for="gate_valve_lap">Gate Valve (Lap) <span
                                                class="text-danger">*</span></label>
                                        <select id="gate_valve_lap" name="gate_valve_lap" class="form-select"
                                            required>
                                            <option value="">-- pilih diameter --</option>
                                            @foreach ($diameters as $diameter)
                                                <option value="{{ $diameter->id }}">{{ $diameter->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Pipa GIS Selection -->
                                    <div class="col-sm-12">
                                        <label class="form-label" for="pipa_gis">Pipa (GIS) <span
                                                class="text-danger">*</span></label>
                                        <select id="pipa_gis" name="pipa_gis" class="form-select" required>
                                            <option value="">Pilih Jenis Pipa</option>
                                            @foreach ($pipas as $pipa)
                                                <option value="{{ $pipa->id }}">{{ $pipa->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Pipa Lapangan Selection -->
                                    <div class="col-sm-12">
                                        <label class="form-label" for="pipa_lap">Pipa (Lap) <span
                                                class="text-danger">*</span></label>
                                        <select id="pipa_lap" name="pipa_lap" class="form-select" required>
                                            <option value="">-- pilih jenis pipa --</option>
                                            @foreach ($pipas as $pipa)
                                                <option value="{{ $pipa->id }}">{{ $pipa->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Air Valve GIS Selection -->
                                    <div class="col-sm-12">
                                        <label class="form-label" for="air_valve_gis">Air Valve (GIS) <span
                                                class="text-danger">*</span></label>
                                        <select id="air_valve_gis" name="air_valve_gis" class="form-select" required>
                                            <option value="">-- pilih diameter --</option>
                                            @foreach ($diameters as $diameter)
                                                <option value="{{ $diameter->id }}">{{ $diameter->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Air Valve Lapangan Selection -->
                                    <div class="col-sm-12">
                                        <label class="form-label" for="air_valve_lap">Air Valve (Lap) <span
                                                class="text-danger">*</span></label>
                                        <select id="air_valve_lap" name="air_valve_lap" class="form-select" required>
                                            <option value="">-- pilih diameter</option>
                                            @foreach ($diameters as $diameter)
                                                <option value="{{ $diameter->id }}">{{ $diameter->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Location Field -->
                                    <div class="col-sm-12">
                                        <label class="form-label" for="lokasi">Lokasi <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="lokasi" name="lokasi" class="form-control"
                                            placeholder="Lokasi pekerjaan" required />
                                    </div>

                                    <!-- Description Field -->
                                    <div class="col-sm-12">
                                        <label class="form-label" for="keterangan">Keterangan</label>
                                        <textarea id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan tambahan" rows="2"></textarea>
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

                        <!-- Edit Modal -->
                        <div class="offcanvas custom-offcanvas-center" id="edit-record">
                            <div class="offcanvas-header border-bottom">
                                <h5 class="offcanvas-title" id="editModalLabel">Edit Data Update GIS</h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body flex-grow-1">
                                <form class="edit-record pt-0 row g-2" id="form-edit-record"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" id="edit_id" name="id">

                                    <!-- Tanggal -->
                                    <div class="col-sm-12">
                                        <label class="form-label" for="edit_tanggal">Tanggal <span
                                                class="text-danger">*</span></label>
                                        <input type="date" id="edit_tanggal" name="tanggal" class="form-control"
                                            required />
                                    </div>

                                    <!-- Divisi -->
                                    <div class="col-sm-12">
                                        <label class="form-label" for="edit_divisi_id">Divisi <span
                                                class="text-danger">*</span></label>
                                        <select id="edit_divisi_id" name="divisi_id" class="form-select" required>
                                            <option value="">-- pilih divisi --</option>
                                            @foreach ($divisis as $divisi)
                                                <option value="{{ $divisi->id }}">{{ $divisi->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Kegiatan -->
                                    <div class="col-sm-12">
                                        <label class="form-label" for="edit_kegiatan">Kegiatan <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="edit_kegiatan" name="kegiatan"
                                            class="form-control" required />
                                    </div>

                                    <!-- Koordinat -->
                                    <div class="col-sm-12">
                                        <label class="form-label" for="edit_koordinat">Koordinat <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="edit_koordinat" name="koordinat"
                                            class="form-control" required />
                                    </div>

                                    <!-- Volume -->
                                    <div class="col-sm-12">
                                        <label class="form-label" for="edit_vol">Vol (m) <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="edit_vol" name="vol" class="form-control"
                                            required />
                                    </div>

                                    <!-- Gate Valve GIS -->
                                    <div class="col-sm-12">
                                        <label class="form-label" for="edit_gate_valve_gis">Gate Valve (GIS) <span
                                                class="text-danger">*</span></label>
                                        <select id="edit_gate_valve_gis" name="gate_valve_gis" class="form-select"
                                            required>
                                            <option value="">-- pilih diameter --</option>
                                            @foreach ($diameters as $diameter)
                                                <option value="{{ $diameter->id }}">{{ $diameter->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Gate Valve Lapangan -->
                                    <div class="col-sm-12">
                                        <label class="form-label" for="edit_gate_valve_lap">Gate Valve (Lap)
                                            <span class="text-danger">*</span></label>
                                        <select id="edit_gate_valve_lap" name="gate_valve_lap" class="form-select"
                                            required>
                                            <option value="">-- pilih diameter --</option>
                                            @foreach ($diameters as $diameter)
                                                <option value="{{ $diameter->id }}">{{ $diameter->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Pipa GIS -->
                                    <div class="col-sm-12">
                                        <label class="form-label" for="edit_pipa_gis">Pipa (GIS) <span
                                                class="text-danger">*</span></label>
                                        <select id="edit_pipa_gis" name="pipa_gis" class="form-select" required>
                                            <option value="">-- pilih pipa --</option>
                                            @foreach ($pipas as $pipa)
                                                <option value="{{ $pipa->id }}">{{ $pipa->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Pipa Lapangan -->
                                    <div class="col-sm-12">
                                        <label class="form-label" for="edit_pipa_lap">Pipa (Lap) <span
                                                class="text-danger">*</span></label>
                                        <select id="edit_pipa_lap" name="pipa_lap" class="form-select" required>
                                            <option value="">-- pilih pipa --</option>
                                            @foreach ($pipas as $pipa)
                                                <option value="{{ $pipa->id }}">{{ $pipa->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Air Valve GIS -->
                                    <div class="col-sm-12">
                                        <label class="form-label" for="edit_air_valve_gis">Air Valve (GIS) <span
                                                class="text-danger">*</span></label>
                                        <select id="edit_air_valve_gis" name="air_valve_gis" class="form-select"
                                            required>
                                            <option value="">Pilih Diameter</option>
                                            @foreach ($diameters as $diameter)
                                                <option value="{{ $diameter->id }}">{{ $diameter->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Air Valve Lapangan -->
                                    <div class="col-sm-12">
                                        <label class="form-label" for="edit_air_valve_lap">Air Valve (Lapangan) <span
                                                class="text-danger">*</span></label>
                                        <select id="edit_air_valve_lap" name="air_valve_lap" class="form-select"
                                            required>
                                            <option value="">Pilih Diameter</option>
                                            @foreach ($diameters as $diameter)
                                                <option value="{{ $diameter->id }}">{{ $diameter->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Lokasi -->
                                    <div class="col-sm-12">
                                        <label class="form-label" for="edit_lokasi">Lokasi <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="edit_lokasi" name="lokasi" class="form-control"
                                            required />
                                    </div>

                                    <!-- Keterangan -->
                                    <div class="col-sm-12">
                                        <label class="form-label" for="edit_keterangan">Keterangan</label>
                                        <textarea id="edit_keterangan" name="keterangan" class="form-control" rows="2"></textarea>
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
                        
                        <!-- Detail Modal -->
                        <div class="offcanvas custom-offcanvas-center" id="detail-record">
                            <div class="offcanvas-header border-bottom">
                                <h5 class="offcanvas-title">Detail Data GIS</h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body flex-grow-1">
                                <form class="pt-0 row g-2">
                                    <div class="col-sm-12">
                                        <label class="form-label">Tanggal</label>
                                        <input type="date" class="form-control" name="tanggal" readonly>
                                    </div>
                                    <div class="col-sm-12">
                                        <label class="form-label">Divisi</label>
                                        <input type="text" class="form-control" name="divisi" readonly>
                                    </div>
                                    <div class="col-sm-12">
                                        <label class="form-label">Kegiatan</label>
                                        <input type="text" class="form-control" name="kegiatan" readonly>
                                    </div>
                                    <div class="col-sm-12">
                                        <label class="form-label">Koordinat</label>
                                        <input type="text" class="form-control" name="koordinat" readonly>
                                    </div>
                                    <div class="col-sm-12">
                                        <label class="form-label">Volume</label>
                                        <input type="text" class="form-control" name="vol" readonly>
                                    </div>
                                    <div class="col-sm-12">
                                        <label class="form-label">Gate Valve (GIS)</label>
                                        <input type="text" class="form-control" name="gate_valve_gis" readonly>
                                    </div>
                                    <div class="col-sm-12">
                                        <label class="form-label">Gate Valve (Lapangan)</label>
                                        <input type="text" class="form-control" name="gate_valve_lap" readonly>
                                    </div>
                                    <div class="col-sm-12">
                                        <label class="form-label">Pipa (GIS)</label>
                                        <input type="text" class="form-control" name="pipa_gis" readonly>
                                    </div>
                                    <div class="col-sm-12">
                                        <label class="form-label">Pipa (Lapangan)</label>
                                        <input type="text" class="form-control" name="pipa_lap" readonly>
                                    </div>
                                    <div class="col-sm-12">
                                        <label class="form-label">Air Valve (GIS)</label>
                                        <input type="text" class="form-control" name="air_valve_gis" readonly>
                                    </div>
                                    <div class="col-sm-12">
                                        <label class="form-label">Air Valve (Lapangan)</label>
                                        <input type="text" class="form-control" name="air_valve_lap" readonly>
                                    </div>
                                    <div class="col-sm-12">
                                        <label class="form-label">Lokasi</label>
                                        <input type="text" class="form-control" name="lokasi" readonly>
                                    </div>
                                    <div class="col-sm-12">
                                        <label class="form-label">Keterangan</label>
                                        <textarea class="form-control" name="keterangan" rows="2" readonly></textarea>
                                    </div>
                                    <div class="col-sm-12 mt-3">
                                        <button type="button" class="btn btn-outline-secondary"
                                            data-bs-dismiss="offcanvas">Tutup</button>
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
                ajax: "{{ route('data-update-gis.index') }}",
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
                        data: 'kegiatan',
                        name: 'kegiatan'
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
                        data: 'koordinat',
                        name: 'koordinat'
                    },
                    {
                        data: 'pipa_gis', // dari addColumn('pipa_gis', ...)
                        name: 'pipa_gis'
                    },
                    {
                        data: 'pipa_lap', // dari addColumn('pipa_lap', ...)
                        name: 'pipa_lap'
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

            $('div.head-label').html('<h5 class="card-title mb-0">Data Update GIS</h5>');

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
                    url: "{{ route('data-update-gis.store') }}",
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
                var url = "{{ route('data-update-gis.destroy', ':id') }}".replace(':id', id);

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
            var url = "{{ route('data-update-gis.edit', ':id') }}".replace(':id', id);

            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    $('#edit_id').val(response.id);
                    $('#edit_tanggal').val(response.tanggal);
                    $('#edit_divisi_id').val(response.divisi_id);
                    $('#edit_kegiatan').val(response.kegiatan);
                    $('#edit_koordinat').val(response.koordinat);
                    $('#edit_vol').val(response.vol);
                    $('#edit_gate_valve_gis').val(response.gate_valve_gis);
                    $('#edit_gate_valve_lap').val(response.gate_valve_lap);
                    $('#edit_pipa_gis').val(response.pipa_gis);
                    $('#edit_pipa_lap').val(response.pipa_lap);
                    $('#edit_air_valve_gis').val(response.air_valve_gis);
                    $('#edit_air_valve_lap').val(response.air_valve_lap);
                    $('#edit_lokasi').val(response.lokasi);
                    $('#edit_keterangan').val(response.keterangan);

                    const editOffcanvas = new bootstrap.Offcanvas($('#edit-record')[0]);
                    editOffcanvas.show();

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
            var url = "{{ route('data-update-gis.update', ':id') }}".replace(':id', id);
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

        // detail modal
        $(document).on('click', '.btn-detail', function() {
            var id = $(this).data('id');
            var url = "{{ route('data-update-gis.show', ':id') }}".replace(':id', id);

            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    if (response.success) {
                        var data = response.data;

                        $('#detail-record input[name="tanggal"]').val(data.tanggal);
                        $('#detail-record input[name="divisi"]').val(data.divisi.nama);
                        $('#detail-record input[name="kegiatan"]').val(data.kegiatan);
                        $('#detail-record input[name="koordinat"]').val(data.koordinat);
                        $('#detail-record input[name="vol"]').val(data.vol);
                        $('#detail-record input[name="gate_valve_gis"]').val(data.gate_valve_gis);
                        $('#detail-record input[name="gate_valve_lap"]').val(data.gate_valve_lap);
                        $('#detail-record input[name="pipa_gis"]').val(data.pipa_gis);
                        $('#detail-record input[name="pipa_lap"]').val(data.pipa_lap);
                        $('#detail-record input[name="air_valve_gis"]').val(data.air_valve_gis);
                        $('#detail-record input[name="air_valve_lap"]').val(data.air_valve_lap);
                        $('#detail-record input[name="lokasi"]').val(data.lokasi);
                        $('#detail-record textarea[name="keterangan"]').val(data.keterangan);

                        // Gunakan DOM native, bukan jQuery!
                        var detailOffcanvas = new bootstrap.Offcanvas(document.getElementById(
                            'detail-record'));
                        detailOffcanvas.show();
                    }
                },
                error: function(xhr) {
                    alert('Data gagal diambil.');
                }
            });
        });

        // modal detail
        $(document).on('click', '.btn-show-detail', function() {
            const button = $(this);
            const id = button.data('id');
            const url = `/data-update-gis/${id}`;

            // Show loading state
            $('#detailContent').html(`
            <div class="text-center py-5">
                <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;"></div>
                <p class="mt-3">Memuat data Update GIS...</p>
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
