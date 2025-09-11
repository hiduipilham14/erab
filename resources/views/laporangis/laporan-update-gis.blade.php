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
            page-break-inside: auto;
        }
        tr {
            page-break-inside: avoid;
            page-break-after: auto;
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
            font-size: 10px;
            color: #222121ff;
            word-break: break-all;
        }
        .no-koordinat {
            color: #222121ff;
            font-style: italic;
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
    <table class="logo-header" border="0">
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
            <span><b>UPDATE DATA GIS</b></span>
        </div>

        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th rowspan="2" class="text-center" style="width:3%">NO</th>
                            <th rowspan="2" class="text-center" style="width:15%">Tanggal</th>
                            <th rowspan="2" class="text-center" style="width:15%">Kegiatan</th>
                           
                            <th rowspan="2" class="text-center" style="width:10%">Koordinat</th>
                            <th colspan="2" class="text-center" style="width:10%">Jenis Pipa (DN)</th>
                            <th rowspan="2" class="text-center" style="width:5%">Vol (m)</th>
                            <th colspan="2" class="text-center" style="width:10%">Gate Valve</th>
                            <th colspan="2" class="text-center" style="width:10%">Air Valve</th>
                             <th rowspan="2" class="text-center" style="width:20%">Lokasi</th>
                            <th rowspan="2" class="text-center" style="width:15%">Keterangan</th>
                        </tr>
                        <tr>
                            <th class="text-center" style="width:5%">GIS</th>
                            <th class="text-center" style="width:5%">LAP</th>
                            <th class="text-center" style="width:5%">GIS</th>
                            <th class="text-center" style="width:5%">LAP</th>
                            <th class="text-center" style="width:5%">GIS</th>
                            <th class="text-center" style="width:5%">LAP</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($get_laporan) > 0)
                            @foreach($get_laporan as $divisi => $laporanByLokasi)
                                <tr>
                                    <td colspan="13" class="divisi-text">DIVISI {{ strtoupper($divisi) }}</td>
                                </tr>

                                @php $rowCount = 1; @endphp

                                @foreach($laporanByLokasi as $lokasi => $daftarLaporan)
                                    @foreach($daftarLaporan as $laporan)
                                        <tr>
                                            <td class="text-center">{{ $rowCount++ }}</td>
                                            <td>{{ \Carbon\Carbon::parse($laporan->tanggal)->format('d/m/Y') }}</td>
                                            <td>{{ $laporan->kegiatan }}</td>
                                            
                                            <td class="koordinat-text">
                                                @if($laporan->koordinat)
                                                    {{ $laporan->koordinat }}
                                                @else
                                                    <span class="no-koordinat">-</span>
                                                @endif
                                            </td>
                                            <td class="sm-text">{{ $laporan->pipaGis->nama ?? '-' }}</td>
                                            <td class="sm-text">{{ $laporan->pipaLap->nama ?? '-' }}</td>
                                            <td class="sm-text">
                                                @if(is_numeric($laporan->vol))
                                                    {{ number_format((float)$laporan->vol, 2) }}
                                                @else
                                                    {{ $laporan->vol ?? '-' }}
                                                @endif
                                            </td>
                                            <td class="sm-text">{{ $laporan->gateValveGis->nama ?? '-' }}</td>
                                            <td class="sm-text">{{ $laporan->gateValveLap->nama ?? '-' }}</td>
                                            <td class="sm-text">{{ $laporan->airValveGis->nama ?? '-' }}</td>
                                            <td class="sm-text">{{ $laporan->airValveLap->nama ?? '-' }}</td>
                                            <td><strong>{{ $laporan->lokasi }}</strong></td>
                                            <td class="text-keterangan">{!! $laporan->keterangan ? nl2br(e($laporan->keterangan)) : '-' !!}</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            @endforeach
                        @else
                            <tr>
                                <td colspan="12" class="text-center">Tidak ada data.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                <!-- @include('laporangis.ttd-form') -->
            </div>
        </div>
    </div>
</body>
</html>
