@extends('template.main')
@section('title', $title)
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Jabatan /</span> <?= $title ?></h4>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header text-end">
                        <a href="{{ route('jabatan.index') }}" class="btn btn-warning btn-sm float-right rounded">
                            <i class="fa-solid fa-rotate-left me-1"></i> Kembali
                        </a>
                    </h5>
                    <div class="card-body">
                        <form action="{{ route('jabatan.update', ['jabatan' => $jabatan->id]) }}" method="POST"
                            class="row g-3 needs-validation" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="col-md-6">
                                <label class="form-label" for="name">Nama Jabatan <span
                                        class="text-danger">*</span></label>
                                <input type="text" id="name"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="Nama Jabatan"
                                    name="name" value="{{ old('name', $jabatan->name) }}" required />
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="note">Keterangan</label>
                                <textarea name="note" id="note" class="form-control  @error('note') is-invalid @enderror" rows="3"
                                    placeholder="Keterangan">{{ old('note', $jabatan->note) }}</textarea>
                                @error('note')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12 text-end">
                                <button type="reset" class="btn btn-secondary btn-sm rounded"><i
                                        class="fa-solid fa-rotate me-1"></i> Reset </button>
                                <button type="submit" class="btn btn-primary btn-sm rounded"><i
                                        class="fa-solid fa-floppy-disk me-1"></i> Simpan </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
