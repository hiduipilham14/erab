<style>
    .detail-container {
        font-size: 12px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .detail-item {
        margin-bottom: 0.75rem;
        display: flex;
        flex-direction: row;
    }

    .detail-label {
        min-width: 140px;
        font-weight: 600;
        color: #333;
    }

    .detail-value {
        flex: 1;
        color: #555;
        word-break: break-word;
    }

    .attachments h5 {
        font-weight: 600;
        margin-bottom: 0.75rem;
        color: #333;
    }

    .attachments .list-group-item {
        display: flex;
        align-items: center;
        font-size: 14px;
        padding: 0.5rem 1rem;
        border-left: none;
        border-right: none;
    }

    .badge {
        font-size: 0.85rem;
        padding: 0.35rem 0.75rem;
    }

    h4 {
        color: #2c3e50;
        font-weight: 600;
    }
</style>

<div class="detail-container">

    <div class="row">
        <div class="col-md-6">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 40%;">Tanggal</th>
                    <td style="width: 60%;">{{ $data->formatted_tanggal }}</td>
                </tr>
                <tr>
                    <th style="width: 40%;">Divisi</th>
                    <td style="width: 60%;">{{ $data->divisi->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <th style="width: 40%;">Koordinat</th>
                    <td style="width: 60%;">{{ $data->koordinat ?? '-' }}</td>
                </tr>
                <tr>
                    <th style="width: 40%;">Volume</th>
                    <td style="width: 60%;">{{ $data->vol ?? '-' }}</td>
                </tr>
                <tr>
                    <th style="width: 40%;">Gate Valve (GIS)</th>
                    <td style="width: 60%;">{{ $data->gateValveGis->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <th style="width: 40%;">Gate Valve (Lapangan)</th>
                    <td style="width: 60%;">{{ $data->gateValveLap->nama ?? '-' }}</td>
                </tr>
                @if ($data->keterangan)
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
                    <th style="width: 40%;">Pipa (GIS)</th>
                    <td style="width: 60%;">{{ $data->pipaGis->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <th style="width: 40%;">Pipa (Lap)</th>
                    <td style="width: 60%;">{{ $data->pipaLap->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <th style="width: 40%;">Air Valve (GIS)</th>
                    <td style="width: 60%;">{{ $data->airValveGis->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <th style="width: 40%;">Air Valve (Lap)</th>
                    <td style="width: 60%;">{{ $data->airValveLap->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <th style="width: 40%;">Lokasi</th>
                    <td style="width: 60%;">{{ $data->lokasi ?? '-' }}</td>
                </tr>
             </table>
        </div>
    </div>
</div>
