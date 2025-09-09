@extends('template.main')
@section('title', $title)
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">User /</span> <?= $title ?></h4>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header text-end">
                        <a href="{{ route('user.index') }}" class="btn btn-warning btn-sm float-right rounded">
                            <i class="fa-solid fa-rotate-left me-1"></i> Kembali
                        </a>
                    </h5>
                    <div class="card-body">
                        <form action="{{ route('user.update', ['user' => $user->id]) }}" method="POST"
                            class="row g-3 needs-validation" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="col-md-6">
                                <label class="form-label" for="username">Username <span class="text-danger">*</span></label>
                                <input type="text" id="username"
                                    class="form-control @error('username') is-invalid @enderror" placeholder="Username"
                                    name="username" value="{{ old('name', $user->username) }}" required />
                                @error('username')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="name">Nama User <span
                                        class="text-danger">*</span></label>
                                <input type="text" id="name"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="Nama User"
                                    name="name" value="{{ old('name', $user->name) }}" required />
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="status">Status <span class="text-danger">*</span></label>
                                <select name="status" id="status"
                                    class="selectpicker w-100 @error('status') is-invalid @enderror"
                                    data-style="btn-default" data-live-search="true" required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="1" {{ old('status', $user->status) == '1' ? 'selected' : null }}>
                                        Aktif
                                    </option>
                                    <option value="0" {{ old('status', $user->status) == '0' ? 'selected' : null }}>
                                        Non Aktif</option>
                                </select>
                                @error('status')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="role_id">Jabatan <span class="text-danger">*</span></label>
                                <select name="role_id" id="role_id"
                                    class="selectpicker w-100 @error('role_id') is-invalid @enderror"
                                    data-style="btn-default" data-live-search="true" required>
                                    <option value="">-- Pilih Jabatan --</option>
                                    @foreach ($role as $data)
                                        <option value="{{ $data->id }}"
                                            {{ old('role_id', $user->role_id) == $data->id ? 'selected' : null }}>
                                            {{ $data->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role_id')
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
@section('js')
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            var levelSelect = document.getElementById('role_id');
            var gudangSelect = document.getElementById('gudang_id');

            levelSelect.addEventListener('change', function() {
                if (this.value != '1') {
                    gudangSelect.classList.add('required');
                    gudangSelect.setAttribute('required', 'required');
                } else {
                    gudangSelect.classList.remove('required');
                    gudangSelect.removeAttribute('required');
                }
            });

            if (levelSelect.value != '1') {
                gudangSelect.classList.add('required');
                gudangSelect.setAttribute('required', 'required');
            } else {
                gudangSelect.classList.remove('required');
                gudangSelect.removeAttribute('required');
            }
        });
    </script> --}}
@endsection