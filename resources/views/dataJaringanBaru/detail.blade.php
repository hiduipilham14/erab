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
    <div class="detail-section">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 40%;">Tanggal</th>
                        <td style="width: 60%;">{{ $data->tanggal }}</td>
                    </tr>
                    <tr>
                        <th style="width: 40%;">Divisi</th>
                        <td style="width: 60%;">{{ $data->data_divisi->nama ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th style="width: 40%;">Koordinat</th>
                        <td style="width: 60%;">{{ $data->koordinat ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th style="width: 40%;">Volume( M )</th>
                        <td style="width: 60%;">
                            @if($data->volumeJaringan && $data->volumeJaringan->count() > 0)
                                @foreach($data->volumeJaringan as $volume)
                                    <span class="badge bg-info text-dark">{{ $volume->volume }}</span>
                                @endforeach
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                     <tr>
                        <th style="width: 40%;">Diameter (inchi)</th>
                        <td style="width: 60%;">
                            @if($data->diameterJaringan && $data->diameterJaringan->count() > 0)
                                @foreach($data->diameterJaringan as $diameter)
                                    <span class="badge bg-info text-dark">{{ $diameter->diameter }}</span>
                                @endforeach
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th style="width: 40%;">Pekerjaan</th>
                        <td style="width: 60%;">{{ $data->pekerjaan ?? '-' }}</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 40%;">Jenis Pipa</th>
                        <td style="width: 60%;">
                            @if($data->jenisPipaJaringan && $data->jenisPipaJaringan->count() > 0)
                                @foreach($data->jenisPipaJaringan as $pipa)
                                    <span class="badge bg-info text-dark">{{ $pipa->jenis_pipa }}</span>
                                @endforeach
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th style="width: 40%;">Lokasi</th>
                        <td style="width: 60%;">{{ $data->lokasi ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th style="width: 40%;">Keterangan</th>
                        <td style="width: 60%;">{{ $data->keterangan ?? '-' }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
