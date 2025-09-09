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
            padding: 0;
            border: 0;
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
            width: 30%;
        }
        .koordinat {
            width: 25%;
        }
        .keterangan {
            width: 25%;
        }
        .kegiatan {
            width: 20%;
        }
        .gislapvol {
            width: 5%;
            text-align: center;
        }
        .dn-col {
            width: 8%;
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
        .logo-header {
            text-align: left;
            border: none;
            margin-top: -40px;
        }
         .logo-header, .logo-header tr th, .logo-header tr td {
            border: none; /* or border: 0; */
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
            <h6><u>LAPORAN GIS BULANAN</u></h6>
            <h6>Bulan: {{ $laporan_bulan }}</h6>
        </div>

        <div class="mt-1 mb-1">
            <span><b>UPDATE DATA PENGEMBANGAN JARINGAN BARU</b></span>
        </div>

        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th class="text-center no">NO</th>
                        <th class="kegiatan text-center">Tanggal</th>
                        <th class="kegiatan text-center">Pekerjaan</th>
                        <th class="lokasi text-center">Lokasi</th>
                        <th class="gislapvol text-center">Jenis Pipa (DN)</th>
                        <th class="dn-col text-center">Diameter (inchi)</th>
                        <th class="gislapvol text-center">Vol (m)</th>
                        <th class="gislapvol text-center">Koordinat</th>
                        <th class="keterangan text-center">Keterangan</th>
                    </tr>

                    @if (count($get_laporan) > 0)
                        @foreach ($get_laporan as $divisi => $laporanByLokasi)
                            @php $lastpekerjaan = null; $rowCount = 0; @endphp
                            <tr>
                                <td colspan="7" class="divisi-text">DIVISI {{ strtoupper($divisi) }}</td>
                            </tr>

                            @foreach($laporanByLokasi as $lokasi => $daftarLaporan)
                                @foreach($daftarLaporan as $laporan)
                                    @php $rowCount += 1; @endphp
                                    <tr>
                                        <td class="text-center">{{ $rowCount }}</td>
                                        <td>{{ \Carbon\Carbon::parse($laporan->tanggal)->format('d/m/Y') }}</td>
                                        @if($laporan->pekerjaan != $lastpekerjaan)
                                            <td>{{ $laporan->pekerjaan }}</td>
                                            @php $lastpekerjaan = $laporan->pekerjaan @endphp
                                        @else
                                            <td>~</td>
                                        @endif

                                        <td style="font-size: 10px;">
                                            <strong>{{ $laporan->lokasi }}</strong>
                                        </td>
                                        <td class="sm-text">{{ $laporan->data_pipas->nama ?? '-' }}</td>
                                        <td class="dn-col">
                                            @if(is_numeric($laporan->data_diameters->nama ?? $laporan->dn))
                                                {{ number_format($laporan->data_diameters->nama ?? $laporan->dn, 0, '', '') }}
                                            @else
                                                {{ $laporan->data_diameters->nama ?? ($laporan->dn ?? '-') }}
                                            @endif
                                        </td>
                                        <td class="sm-text">
                                            @if(is_numeric($laporan->vol))
                                                {{ number_format($laporan->vol, 0, '', '') }}
                                            @else
                                                {{ $laporan->vol ?? '-' }}
                                            @endif
                                        </td>

                                        <td class="koordinat-text">
                                                @if($laporan->koordinat)
                                                    {{ $laporan->koordinat }}
                                                @else
                                                    <span class="no-koordinat">-</span>
                                                @endif
                                        </td>

                                        <td class="text-keterangan">
                                            {!! $laporan->keterangan ? nl2br(e($laporan->keterangan)) : '-' !!}
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data</td>
                        </tr>
                    @endif
                </table>

                <!-- @include('laporangis.ttd-form') -->
            </div>
        </div>
    </div>
</body>
</html>
