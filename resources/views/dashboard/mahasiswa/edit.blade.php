@extends('dashboard.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Data Mahasiswa</h1>
    </div>

    <div class="row">
        <div class="col-6">
            <form action="/dashboard-mahasiswa/{{ $mahasiswa->id }}" method="post">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="number" class="form-control @error('nim') is-invalid
                    @enderror" name="nim"
                        id="nim" value="{{ old('nim', $mahasiswa->nim) }}" readonly>
                    @error('nim')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control @error('nama_lengkap') is-invalid
        @enderror"
                        name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap', $mahasiswa->nama_lengkap) }}">
                    @error('nama_lengkap')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control @error('tempat_lahir') is-invalid
        @enderror"
                        name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir', $mahasiswa->tempat_lahir) }}">
                    @error('nama_lengkap')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tgl_lahir" class="form-label">Tgl Lahir</label>
                    <input type="date" class="form-control @error('tgl_lahir') is-invalid
        @enderror"
                        name="tgl_lahir" id="tgl_lahir" value="{{ old('tgl_lahir', $mahasiswa->tgl_lahir) }}">
                    @error('tgl_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid
        @enderror" name="email"
                        id="email" value="{{ old('email', $mahasiswa->email) }}">
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
                        @if (old('prodi_id',$mahasiswa->prodi_id) == $dataprodi->id)
                        <option value="{{ $dataprodi->id }}" selected>{{ $dataprodi->nama }}</option>

                        @else
                        <option value="{{ $dataprodi->id }}">{{ $dataprodi->nama }}</option>
                        @endif

                        @endforeach
                    </select>
                  </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat">{{ old('alamat', $mahasiswa->alamat) }}
            @error('alamat')
<div class="invalid-feedback">
            {{ $message }}
        </div>
@enderror

    </textarea>
                </div>
                <div class="mb-3">

                    <input type="submit" class="btn btn-primary" name="submit">
                </div>
            </form>
        </div>
    </div>
@endsection
