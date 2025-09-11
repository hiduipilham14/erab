@extends('template.main')
@section('title', $title)
@section('content')
    <div class="container-xxl">
        <h4 class="py-1 my-2"><?= $title ?></h4>
        <div class="row">
            <div class="card">
                <div class="col-md-12 mt-1">
                    <div class="card-header pb-0 card-no-border">
                        <div class="row d-flex">
                            <div class="col-md-4 col-12 mb-4 mt-2">
                                <label class="form-label">Tanggal Awal</label>
                                <input type="text" id="start_date" name="start" placeholder="HH/BB/TTTT" class="form-control datepicker">
                            </div>
                            <div class="col-md-4 col-12 mb-4 mt-2">
                                <label class="form-label">Tanggal Akhir</label>
                                <input type="text" id="end_date" name="end" placeholder="HH/BB/TTTT" class="form-control datepicker">
                            </div>
                            <div class="col-md-4 col-12 mb-4 mt-2" style="align-content: end">
                                <button type="button" name="filter" id="filter"
                                    class="btn btn-primary waves-effect waves-light mt-1"><i
                                        class="fas fa-filter me-1"></i>
                                    Filter</button>
                                <button type="button" name="reset" id="reset"
                                    class="btn btn-secondary waves-effect waves-light mt-1"><i
                                        class="fas fa-sync-alt me-1"></i>
                                    Reset</button>
                                <button type="button" name="print" id="print"
                                    class="btn btn-dark waves-effect waves-light mt-1"><i
                                        class="fas fa-print me-1"></i>
                                    Print</button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card-datatable table-responsive">
                    <table class="dt-responsive table table-bordered table-hover" id="tblaporanrab">
                        <thead>
                            <tr>
                                <th class="text-center"><b>No</b></th>
                                <th class="text-center sorting_disabled"><b>Tanggal</b></th>
                                <th class="text-center sorting_disabled"><b>No.SPK</b></th>
                                <th class="text-center sorting_disabled"><b>Pekerjaan</b></th>
                                <th class="text-center sorting_disabled"><b>Vol (m)</b></th>
                                <th class="text-center sorting_disabled"><b>Lokasi</b></th>
                                <th class="text-center sorting_disabled"><b>RAB (Rp)</b></th>
                                <th class="text-center sorting_disabled"><b>Bahan (Rp)</b></th>
                                <th class="text-center sorting_disabled"><b>Upah (Rp)</b></th>
                                <th class="text-center sorting_disabled"><b>Jumlah (Rp)</b></th>
                                <th class="text-center sorting_disabled"><b>GIS</b></th>
                                <th class="text-center sorting_disabled"><b>KETERANGAN</b></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
              /**
             * sends a request to the specified url from a form. this will change the window location.
             * @param {string} path the path to send the post request to
             * @param {object} params the parameters to add to the url
             * @param {string} [method=post] the method to use on the form
             */
            function post(path, params, method='post') {

            // The rest of this code assumes you are not using a library.
            // It can be made less verbose if you use one.
            const form = document.createElement('form');
            form.method = method;
            form.action = path;
            form.target = "_blank";

            for (const key in params) {
                if (params.hasOwnProperty(key)) {
                const hiddenField = document.createElement('input');
                hiddenField.type = 'hidden';
                hiddenField.name = key;
                hiddenField.value = params[key];

                form.appendChild(hiddenField);
                }
            }

            document.body.appendChild(form);
            form.submit();
            }
    </script>
    <script>
        $(function() {
            load_data();

            function load_data(start = '', end = '') {
                
                var table = $('#tblaporanrab').DataTable({
                    processing: true,
                    responsive: true,
                    serverSide: true,
                    stateSave: false,
                    columnDefs: [{
                            "className": "dt-center",
                            "targets": "_all"
                        }
                    ],
                    ajax: {
                        url: "{{ route('laporan-rab.index') }}",
                        data: {
                            start_date: start,
                            end_date: end
                        },
                    },
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'tanggal',
                            name: 'tanggal',
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
                            data: 'vol',
                            name: 'vol'
                        },
                        {
                            data: 'lokasi',
                            name: 'lokasi'
                        },
                        {
                            data: 'rab',
                            name: 'rab'
                        },
                        {
                            data: 'bahan',
                            name: 'bahan'
                        },
                        {
                            data: 'upah',
                            name: 'upah'
                        },
                        {
                            data: 'jumlah',
                            name: 'jumlah'
                        },
                        {
                            data: 'gis',
                            name: 'gis'
                        },
                        {
                            data: 'keterangan',
                            name: 'keterangan'
                        },
                    ],
                });

                table.on('draw', function() {
                    reinitializeTooltips();
                });

                table.on('responsive-display', function() {
                    reinitializeTooltips();
                });

                function reinitializeTooltips() {
                    $('[data-bs-toggle="tooltip"]').tooltip({
                        trigger: 'hover'
                    });
                }
            }

            $('#filter').click(function () {
                var start_date = $('#start_date').val();
                var end_date = $('#end_date').val();
                
                if (start_date && end_date) {
                    $('#tblaporanrab').DataTable().destroy();
                    load_data(start_date, end_date);
                } else {
                    Swal.fire({
                        title: 'Warning',
                        text: "Tanggal Awal dan Tangal Akhir harus terisi !",
                        icon: 'warning',
                        customClass: {
                            confirmButton: "btn btn-warning me-3 waves-effect waves-light",
                        },
                    });
                }
            });

            $('#print').click(function () {
                var start_date = $('#start_date').val();
                var end_date = $('#end_date').val();
                const csrf = "{{ csrf_token() }}"

                
                if (start_date && end_date) {
                    console.log({start_date, end_date})
                    post('{{ route('laporan-rab.store')}}', {start_date, end_date, "_token": csrf});
                } else {
                    Swal.fire({
                        title: 'Warning',
                        text: "Tanggal Awal dan Tangal Akhir harus terisi !",
                        icon: 'warning',
                        customClass: {
                            confirmButton: "btn btn-warning me-3 waves-effect waves-light",
                        },
                    });
                }
            })
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.datepicker').datepicker({
                todayHighlight: true,
                format: 'dd/mm/yyyy',
                orientation: 'auto left',
                autoclose: true,
                endDate: new Date()
            });
        });
    </script>
@endsection