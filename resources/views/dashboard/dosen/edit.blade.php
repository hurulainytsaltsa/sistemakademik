@extends('dashboard.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Data Dosen</h1>
    </div>

    <div class="row">
        <div class="col-6">
            <form action="/dashboard-dosen/{{ $dosen->id }}" method="post">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="number" class="form-control @error('nik') is-invalid
                    @enderror" name="nik"
                        id="nik" value="{{ old('nik', $dosen->nik) }}" readonly>
                    @error('nik')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control @error('nama') is-invalid
        @enderror"
                        name="nama" id="nama" value="{{ old('nama', $dosen->nama) }}">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="no_telp" class="form-label">No Telp</label>
                    <input type="number" class="form-control @error('no_telp') is-invalid
                    @enderror" name="no_telp" id="no_telp" value="{{ old('no_telp', $dosen->no_telp) }}">
                    @error('no_telp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid
        @enderror" name="email"
                        id="email" value="{{ old('email', $dosen->email) }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Prodi</label>
                    <select name="prodi_id" class="form-select">
                        <option value="">Pilih Prodi</option>
                        @foreach ($prodis as $dataprodi)
                        @if (old('prodi_id',$dosen->prodi_id) == $dataprodi->id)
                        <option value="{{ $dataprodi->id }}" selected>{{ $dataprodi->nama }}</option>

                        @else
                        <option value="{{ $dataprodi->id }}">{{ $dataprodi->nama }}</option>
                        @endif

                        @endforeach
                    </select>
                  </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat">{{ old('alamat', $dosen->alamat) }}
            @error('alamat')
<div class="invalid-feedback">
            {{ $message }}
        </div>
@enderror

    </textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jabatan</label>
                    <select name="jabatan" class="form-select @error('jabatan') is-invalid @enderror">
                        <option value="">Pilih Jabatan</option>
                        <option value="Asisten Ahli" {{ old('jabatan', $dosen->jabatan) == 'Asisten Ahli' ? 'selected' : '' }}>Asisten Ahli</option>
                        <option value="Lektor" {{ old('jabatan', $dosen->jabatan) == 'Lektor' ? 'selected' : '' }}>Lektor</option>
                        <option value="Lektor Kepala" {{ old('jabatan', $dosen->jabatan) == 'Lektor Kepala' ? 'selected' : '' }}>Lektor Kepala</option>
                        <option value="Guru Besar" {{ old('jabatan', $dosen->jabatan) == 'Guru Besar' ? 'selected' : '' }}>Guru Besar</option>
                    </select>
                    @error('jabatan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">

                    <input type="submit" class="btn btn-primary" name="submit">
                </div>
            </form>
        </div>
    </div>
@endsection
