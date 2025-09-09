<style>
    .detail-container { font-size: 14px; font-family: 'Segoe UI', sans-serif; color: #333; }
    .detail-item { margin-bottom: 0.75rem; display: flex; }
    .detail-label { min-width: 160px; font-weight: 600; }
    .detail-value { flex: 1; color: #555; word-break: break-word; }
    .badge { font-size: 0.85rem; padding: 0.35rem 0.75rem; }
    h4 { color: #2c3e50; font-weight: 600; margin-bottom: 1.5rem; }
    .detail-section { margin-bottom: 1.5rem; border-bottom: 1px solid #eee; padding-bottom: 1rem; }
    .detail-section:last-child { border-bottom: none; }
</style>

<div class="detail-container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Detail Jaringan Baru</h4>
        <span class="badge bg-primary">Jaringan Baru</span>
    </div>

    <div class="detail-section">
        <div class="row">
            <div class="col-md-6">
                <div class="detail-item">
                    <span class="detail-label">Tanggal:</span>
                    <span class="detail-value">{{ $formatted_tanggal ?? '-' }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Divisi:</span>
                    <span class="detail-value">{{ $data->data_divisi->nama ?? '-' }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Pekerjaan:</span>
                    <span class="detail-value">{{ $data->pekerjaan ?? '-' }}</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="detail-item">
                    <span class="detail-label">Volume:</span>
                    <span class="detail-value">{{ $data->vol ?? '-' }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Lokasi:</span>
                    <span class="detail-value">{{ $data->lokasi ?? '-' }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Koordinat:</span>
                    <span class="detail-value">{{ $data->koordinat ?? '-' }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="detail-section">
        <h5>Spesifikasi Pipa</h5>
        <div class="row">
            <div class="col-md-6">
                <div class="detail-item">
                    <span class="detail-label">PIPA:</span>
                    <span class="detail-value">{{ $data->data_pipas->nama ?? '-' }}</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="detail-item">
                    <span class="detail-label">Diameter:</span>
                    <span class="detail-value">{{ $data->data_diameters->nama ?? '-' }}</span>
                </div>
            </div>
        </div>
    </div>

    @if ($data->keterangan)
    <div class="detail-section">
        <div class="detail-item">
            <span class="detail-label">Keterangan:</span>
            <span class="detail-value">{{ $data->keterangan }}</span>
        </div>
    </div>
    @endif
</div>
