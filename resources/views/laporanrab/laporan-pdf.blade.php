<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <style>
        @page { 
            margin-left: 10px;
            margin-right: 10px;
            margin-top: 15px;
            margin-bottom: 15px;
         }
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        .container {
            max-width: 100%;
            margin: 0 auto;
            padding: 5px;
        }

        .text-center {
            text-align: center;
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .card-body {
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
        th,
        td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .mt-2 {
            margin-top: 20px;
        }

        .mb-2 {
            margin-bottom: 20px;
        }
        .text-sm {
            font-size: 11px;
        }

        .column-center {
            text-align: center;
            vertical-align:middle !important;
        }

        .formulir h2 {
            margin-top: 0;
            margin-bottom: 20px;
        }

        .formulir td {
            width: 33%;
        }
    </style>
</head>

<body>
    <table style="text-align: left; border-collapse: collapse; border: none;">
        <tbody>
            <tr>
                <td style="text-align: left; width:5%; border: none;">
                    <img src="./logo.png" alt="" width="50px" height="50px">
                </td>
                <td style="text-align: left; border: none;font-weight: bold;">
                    Perumda Air Minum Tirta Mulia <br>Kabupaten Pemalang
                </td>
            </tr>
        </tbody>
    </table>
    <div class="container">
        <div class="text-center mb-4">
            <h5 style="text-decoration: underline">{{ $title }}
            </h5>
            <p class="text-uppercase">
                <b>periode : {{ $bulan }} </b>
            </p>
        </div>
        <div class="card">
            <div class="card-body">
                <table id="data" class="table table-bordered text-center" style="font-size: 9px;">
                        <tr>
                            <th class="column-center">Tanggal</th>
                            <th class="column-center">Pelaksana</th>
                            <th class="column-center">Masa Pemeliharaan</th>
                            <th class="column-center">Penyedia</th>
                            <th class="column-center">Jenis PIPA</th>
                            <th class="column-center">Diameter (inch)</th>
                            <th class="column-center">Volume</th>
                            <th class="column-center">Honor (Rp)</th>
                            <th class="column-center">RAB (Rp)</th>
                            <th class="column-center">Bahan (Rp)</th>
                            <th class="column-center">Upah (Rp)</th>
                            <th class="column-center">Jumlah (Rp)</th>
                            <th class="column-center">Gis</th>
                            <th class="column-center">Pekerjaan</th>
                            <th class="column-center">Lokasi</th>
                            <th class="column-center">Keterangan</th>

                        </tr>
                        @if (count($data) > 0)
                            @foreach ($data as $row)
                                <tr>
                                    <td class="column-center">{{\Carbon\Carbon::parse($row->tanggal_input)->locale("id")->translatedFormat("d F Y")}}</td>
                                    <td class="column-center">{{\Carbon\Carbon::parse($row->tanggal_pelaksana)->locale("id")->translatedFormat("d F Y")}}</td>
                                    <td class="column-center">{{ $row->masa_pemeliharaan }}</td>
                                    <td class="column-center">{{ $row->penyedia_pipa }}</td>
                                    <td class="column-center">
                                        @php
                                            $jenisPipa = $row->jenisPipaRab
                                            ->pluck('dataPipa.nama')
                                            ->filter() 
                                            ->unique() 
                                            ->toArray();
                                            echo !empty($jenisPipa) ? implode('<br><hr>', $jenisPipa) : '-';
                                        @endphp
                                    </td>
                                    <td class="column-center">
                                        @php
                                            $diameter = $row->diameterRab
                                            ->pluck('dataDiameter.nama')
                                            ->filter()
                                            ->unique()
                                            ->toArray(); 
                                            echo !empty($diameter) ? implode('<br><hr>', $diameter) : '-';
                                        @endphp
                                    </td>
                                    <td class="column-center">
                                        @php
                                            $volume = $row->volumeRab
                                            ->pluck('volume')
                                            ->filter() 
                                            ->unique() 
                                            ->toArray();
                                            echo !empty($volume) ? implode('<br><hr> ', $volume) : '-';
                                        @endphp
                                    </td>
                                    <td class="column-center">Rp {{ number_format($row->honor, 2, ',', '.') }}</td>
                                    <td class="column-center">Rp {{ number_format($row->rab, 2, ',', '.') }}</td>
                                    <td class="column-center">Rp {{ number_format($row->bahan, 2, ',', '.') }}</td>
                                    <td class="column-center">Rp {{ number_format($row->upah, 2, ',', '.') }}</td>
                                    <td class="column-center">Rp {{ number_format($row->jumlah, 2, ',', '.') }}</td>
                                    <td class="column-center">{{ $row->gis }}</td>
                                    <td class="column-center">{{ $row->pekerjaan_gis }}</td>
                                    <td class="column-center">{{ $row->lokasi_gis }}</td>
                                    <td class="column-center">{{ $row->keterangan_gis }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="11" class="text-center">Tidak ada data.</td>
                            </tr>
                        @endif
                </table>
            </div>
            <div class="mt-1">
                <table style="border-collapse: collapse; border: none;">
                    <tbody>
                        <tr>
                            <td style="text-align: center; width:auto; border: none;">
                                <span>Mengetahui:</span> <br>
                                <span><b>Manager Perencanaan</b></span>
                            </td>
                            <td style="text-align: center; width:auto; border: none;">
                                <span>Diperiksa:</span> <br>
                                <span><b>Kadiv Perencanaan</b></span>
                            </td>
                            <td style="text-align: center; width:auto; border: none;">
                                <span>Pemalang, {{ $now }} </span> <br>
                                <span>Dibuat Oleh:</span> <br>
                                <span><b>{{ $staff }}</b></span>
                            </td>
                        </tr>
                        <tr>
                            <td style="border: none;"></td>
                            <td style="border: none;"></td>
                        </tr>
                        <tr>
                            <td style="text-align: center; width:auto; border: none;">
                                <br>
                                <span>Ivon Desi Komalasari,S.T.,M.T.<b><hr style="width:195px; border-top-color: black;"/></b></span>
                                <span style="margin-center: 80px;">NPP. 332709066</span>
                            </td>
                            <td style="text-align: center; width:auto; border: none;">
                                <br>
                                <span>Argo Dwi Prihanto<b><hr style="width:195px; border-top-color: black;"/></b></span>
                                <span style="margin-center: 80px;">NPP. 332716107</span>
                            </td>
                            <td style="text-align: center; width:auto; border: none;">
                                <br>
                                <span>FAIZ DITYA HANGGARA<b><hr style="width:195px; border-top-color: black;"/></b></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
