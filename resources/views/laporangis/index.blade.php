@extends('template.main')
@section('title', $title)
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">Laporan GIS</h4>
        <div class="row">
            <div class="card w-100">
                <div class="card-body">
                    <form action="{{ route('laporan-gis.store') }}" method="POST" class="row" target="_blank">
                        @csrf
                        <div class="col-6 mb-4 mt-2">
                            <label for="kategori" class="form-label">Kategori laporan</label>
                            <select name="kategori" class="form-control" id="kategori" required>
                                <option value="" selected> -- pilih kategori -- </option>
                                <option value="data-gis">Data Update GIS</option>
                                <option value="data-jaringan">Data Jaringan Baru</option>
                                <option value="data-pipa">Data Penggantian Pipa</option>
                                <option value="data-spam">Data SPAM</option>
                            </select>
                            @error('kategori')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 col-12 mb-4 mt-2">
                            <label class="form-label">Pilih Bulan</label>
                            <input type="text" name="bulan" value="{{ old('bulan') }}" placeholder="bb/tttt" class="form-control" id="monthpicker" required="">
                            @error('bulan')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 col-12 mb-4 mt-2">
                            <label class="form-label">Pilih Tanggal Print</label>
                            <input type="text" name="tgl_print" value="{{ old('tgl_print') ?? date('d/m/Y') }}" placeholder="hh/bb/tttt" class="form-control datepicker" required="">
                            @error('tgl_print')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 col-12 mb-4" style="align-content: flex-end;">
                            <button type="reset" class="btn btn-secondary rounded"><i class="fa-solid fa-rotate me-1"></i> Reset </button>
                            <button type="submit" class="btn btn-primary rounded"><i class="fa-solid fa-print me-1"></i> Print </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#monthpicker').datepicker({
                todayHighlight: true,
                format: 'mm/yyyy',
                startView: 'months',
                minViewMode: 'months',
                orientation: 'auto left',
                autoclose: true,
                endDate: new Date()
            });
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