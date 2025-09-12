<style>
    .detail-container { font-size: 12px; font-family: 'Segoe UI', sans-serif; color: #333; }
    .detail-item { margin-bottom: 0.75rem; display: flex; }
    .detail-label { min-width: 160px; font-weight: 600; }
    .detail-value { flex: 1; color: #555; word-break: break-word; }
    .badge { font-size: 0.85rem; padding: 0.35rem 0.75rem; }
    h4 { color: #2c3e50; font-weight: 600; margin-bottom: 1.5rem; }
    .detail-section { margin-bottom: 1.5rem; border-bottom: 1px solid #eee; padding-bottom: 1rem; }
    .detail-section:last-child { border-bottom: none; }
    .spec-title { font-weight: 600; margin-bottom: 1rem; color: #2c3e50; }
</style>

<div class="detail-container">
    <div class="text-center mb-3 d-flex" style="flex-direction:row-reverse">
        <span class="btn btn-success">SPK : {{$data->no_spk}}</span>
    </div>
    <div class="detail-section">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 40%;">Tanggal Input Rab</th>
                        <td style="width: 60%;">{{ $data->tanggal_input }}</td>
                    </tr>
                    <tr>
                        <th style="width: 40%;">Tanggal Pelaksana</th>
                        <td style="width: 60%;">{{ $data->tanggal_pelaksana }}</td>
                    </tr>
                    <tr>
                        <th style="width: 40%;">Tanggal Awal Pekerjaan</th>
                        <td style="width: 60%;">{{ $data->tanggal_awal }}</td>
                    </tr>
                    <tr>
                        <th style="width: 40%;">Tanggal Selesai Pekerjaan</th>
                        <td style="width: 60%;">{{ $data->tanggal_selesai }}</td>
                    </tr>
                    <tr>
                        <th style="width: 40%;">Masa Pemeliharaan</th>
                        <td style="width: 60%;">{{ $data->masa_pemeliharaan }}</td>
                    </tr>
                    <tr>
                        <th style="width: 40%;">Penyedia</th>
                        <td style="width: 60%;">{{ $data->penyedia_pipa }}</td>
                    </tr>
                    <tr>
                        <th style="width: 40%;">Lokasi</th>
                        <td style="width: 60%;">{{ $data->lokasi_gis }}</td>
                    </tr>
                    <tr>
                        <th style="width: 40%;">Pekerjaan</th>
                        <td style="width: 60%;">{{ $data->pekerjaan_gis }}</td>
                    </tr>
                    <tr>
                        <th style="width: 40%;">Keterangan</th>
                        <td style="width: 60%;">{{ $data->keterangan_gis }}</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 40%;">Volume( M )</th>
                        <td style="width: 60%;">
                            @if($data->volumeRab && $data->volumeRab->count() > 0)
                                @foreach($data->volumeRab as $volume)
                                    <span class="badge bg-info text-dark">{{ $volume->volume }}</span>
                                @endforeach
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th style="width: 40%;">Rab (Rp)</th>
                        <td style="width: 60%;">{{ $data->formatted_rab ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th style="width: 40%;">Honor (Rp)</th>
                        <td style="width: 60%;">{{ $data->formatted_honor ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th style="width: 40%;">Bahan (Rp)</th>
                        <td style="width: 60%;">{{ $data->formatted_bahan ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th style="width: 40%;">Upah (Rp)</th>
                        <td style="width: 60%;">{{ $data->formatted_upah ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th style="width: 40%;">Jumlah (Rp)</th>
                        <td style="width: 60%;">{{ $data->formatted_jumlah ?? '-' }}</td>
                    </tr>
                </table>
            </div>

            <div class="col-md-6 mt-5">
                <table border="1" class="table table-bordered">
                    <tr>
                        <th style="width: 40%;">FILE SPK</th>
                        <td style="width: 60%;" id="file_existing-detail">
                            <a href="{{$data->file_spk}}" class="btn btn-success" target="_blank">Lihat File</a>
                        </td>
                    </tr>
                    <tr>
                        <th style="width: 40%;">FILE DED</th>
                        <td style="width: 60%;" id="file_permasalahan-detail">
                             <a href="{{$data->file_ded}}" class="btn btn-success" target="_blank">Lihat File</a>
                        </td>
                    </tr>
                    <tr>
                        <th style="width: 40%;">FILE RAB</th>
                        <td style="width: 60%;" id="file_tindak_lanjut-detail">
                             <a href="{{$data->file_rab}}" class="btn btn-success" target="_blank">Lihat File</a>
                        </td>
                    </tr>
               </table> 
            </div>
        </div>
    </div>
</div>
