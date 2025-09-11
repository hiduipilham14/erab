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
                        <th style="width: 40%;">Lokasi</th>
                        <td style="width: 60%;">{{ $data->lokasi ?? '-' }}</td>
                    </tr>
                    @if($data->keterangan)
                        <tr>
                            <th style="width: 40%;">Keterangan</th>
                            <td style="width: 60%;">{{ $data->keterangan }}</td>
                        </tr>
                    @endif
                </table>
            </div>
            <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 40%;">Th Pemasangan Lama</th>
                        <td style="width: 60%;">{{ $data->th_pemasangan_lama ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th style="width: 40%;">Th Pemasangan Baru</th>
                        <td style="width: 60%;">{{ $data->th_pemasangan_baru ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th style="width: 40%;">Pipa Lama</th>
                        <td style="width: 60%;">{{ $data->pipaLama->nama ?? '-' }}</td>
                    </tr>
                     <tr>
                        <th style="width: 40%;">Pipa Baru</th>
                        <td style="width: 60%;">{{ $data->pipaBaru->nama ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th style="width: 40%;">Volume (M) Lama</th>
                        <td style="width: 60%;">{{ $data->vol_lama ?? '-' }}</td>
                    </tr>
                     <tr>
                        <th style="width: 40%;">Volume (M) Baru</th>
                        <td style="width: 60%;">{{ $data->vol_baru ?? '-' }}</td>
                    </tr>
                      <tr>
                        <th style="width: 40%;">Diameter inch Lama</th>
                        <td style="width: 60%;">{{ $data->diameterLama->nama ?? '-' }}</td>
                    </tr>
                     <tr>
                        <th style="width: 40%;">Diameter inch Baru</th>
                        <td style="width: 60%;">{{ $data->diameterBaru->nama ?? '-' }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
