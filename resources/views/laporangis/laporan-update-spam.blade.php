<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <style>
        @page {
            margin-right: 10px;
            margin-left: 10px;
        }
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        .container {
            max-width: 100%;
            margin: 0 auto;
            padding: 5px;
        }
        .text-center {
            text-align: center;
            vertical-align: middle;
        }
        .card {
            margin-bottom: 20px;
        }
        .card-body {
            padding: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            text-align: center;
        }
        tr {
            break-inside: avoid;
            break-after: auto;
        }
        .lokasi {
            width: 20%;
        }
        .keterangan {
            width: 15%;
        }
        .tanggal {
            width: 8%;
        }
        .koordinat-col {
            width: 12%;
        }
        .gislapvol {
            width: 5%;
            text-align: center;
        }
        .no {
            width: 3%;
        }
        .mt-2 {
            margin-top: 20px;
        }
        .mb-2 {
            margin-bottom: 20px;
        }
        .divisi-text {
            background-color: rgba(247, 248, 248, 0.84);
            font-size: 11px;
            font-weight: bold;
        }
        .text-keterangan {
            font-size: 10px;
        }
        .sm-text {
            font-size: 11px;
            text-align: center;
        }
        .koordinat-text {
            font-size: 9px;
            color: #666;
        }
        .logo-header {
            text-align: left;
            border: none;
            margin-top: -40px;
        }
         .logo-header, .logo-header tr th, .logo-header tr td {
            border: none; /* or border: 0; */
        }
        .card-body {
            padding: 0;
            border: 0;
        }
    </style>
</head>
<body>
    <table class="logo-header">
        <tr>
            <td style="width:5%;">
                <img src="{{ public_path('logo.png') }}" alt="" width="50px" height="50px">
            </td>
            <td>
                Perumda Air Minum Tirta Mulia <br>Kabupaten Pemalang
            </td>
        </tr>
    </table>
    
    <div class="container">
        <div class="text-center mb-2">
            <h6><u>LAPORAN DIVISI GIS BULANAN</u></h6>
            <h6>Bulan: {{ $laporan_bulan }}</h6>
        </div>
        
        <div class="mt-1 mb-1">
            <span><b>DATA EVALUASI SPAM</b></span>
        </div>
        
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th  class="text-center no">NO</th>
                        <th  class="tanggal text-center">KOORDINAT</th>
                        <th  class="lokasi text-center">LOKASI</th>
                         <th  class="lokasi text-center">SPAM</th>
                        <th  class="koordinat-col text-center">KONDISI EKSISTING</th>
                        <th colspan="3" class="text-center">PERMASALAHAN</th>
                        <th  class="text-center">TINDAK LANJUT</th>
                    </tr>
                    
                    @foreach($get_laporan as $data)
                        @php $no = 1; @endphp
                            <tr>
                                <td class="text-center">{{ $no++ }}</td>
                                <td class="koordinat-text">{{ $data->koordinat }}</td>
                                <td class="text-keterangan">{{ $data->lokasi }}</td>
                                <td class="text-keterangan">{{ $data->spam }}</td>
                                <td class="text-keterangan">{{ $data->kondisi_existing }}</td>
                                <td class="text-keterangan" colspan="3">{{ $data->permasalahan }}</td>
                                <td class="text-keterangan">{{ $data->tindak_lanjut }}</td>
                            </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</body>
</html>