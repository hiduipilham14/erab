<style>
    .detail-container {
        font-size: 14px;
    }

    .detail-item {
        margin-bottom: 0.75rem;
        display: flex;
        flex-direction: row;
    }

    .detail-label {
        min-width: 120px;
        font-weight: 600;
        color: #333;
    }

    .detail-value {
        flex: 1;
        color: #555;
    }

    .attachments h5 {
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .attachments .list-group-item {
        display: flex;
        align-items: center;
        font-size: 14px;
    }
</style>
<div class="detail-container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">Detail RAB</h4>
        <span class="badge bg-primary">{{ $data->no_spk }}</span>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="detail-item">
                <span class="detail-label">Tanggal:</span>
                <span class="detail-value">{{ $data->formatted_tanggal }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Tgl Pelaksana:</span>
                <span class="detail-value">{{ $data->formatted_tanggal_pelaksana }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Pekerjaan:</span>
                <span class="detail-value">{{ $data->pekerjaan }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Masa Pemeliharaan:</span>
                <span class="detail-value">{{ $data->masa_pemeliharaan }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Vol (m):</span>
                <span class="detail-value">{{ $data->vol }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Bahan (Rp):</span>
                <span class="detail-value">{{ $data->formatted_bahan }}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="detail-item">
                <span class="detail-label">Lokasi:</span>
                <span class="detail-value">{{ $data->lokasi }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">RAB (Rp):</span>
                <span class="detail-value">{{ $data->formatted_rab }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Upah (Rp):</span>
                <span class="detail-value">{{ $data->formatted_upah }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Jumlah (Rp):</span>
                <span class="detail-value">{{ $data->formatted_jumlah }}</span>
            </div>
        </div>
    </div>

    @if ($data->keterangan)
        <div class="detail-item mt-3">
            <span class="detail-label">Keterangan:</span>
            <span class="detail-value">{{ $data->keterangan }}</span>
        </div>
    @endif

    @if ($data->file || $data->file2 || $data->file3)
        <div class="attachments mt-4">
            <h5>Lampiran:</h5>
            <div class="list-group">
                @if ($data->file)
                    <a href="{{ Storage::url($data->file) }}" target="_blank"
                        class="list-group-item list-group-item-action">
                        <i class="ti ti-file-text me-2"></i> SPK
                    </a>
                @endif
                @if ($data->file2)
                    <a href="{{ Storage::url($data->file2) }}" target="_blank"
                        class="list-group-item list-group-item-action">
                        <i class="ti ti-file-text me-2"></i> DED
                    </a>
                @endif
                @if ($data->file3)
                    <a href="{{ Storage::url($data->file3) }}" target="_blank"
                        class="list-group-item list-group-item-action">
                        <i class="ti ti-file-text me-2"></i> RAB
                    </a>
                @endif
            </div>
        </div>
    @endif
</div>
