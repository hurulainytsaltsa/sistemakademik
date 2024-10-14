@extends('dashboard.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail Data Dosen</h1>
    </div>

    <div class="row">
        <div class="col-12 col-md-8 col-lg-6 mx-auto">
            <div class="card shadow rounded">
                <div class="card-header bg-primary text-white">
                    <h3>{{ $dosen->nama }}</h3>
                </div>
                <div class="card-body">
                    <h5 class="card-title mb-3">NIK: {{ $dosen->nik }}</h5>
                    <h5 class="card-title mb-3">Jabatan: {{ $dosen->jabatan }}</h5>
                    <hr>
                    <p class="card-text"><strong>Prodi: </strong>{{ $dosen->prodi->nama }}</p>
                    <p class="card-text"><strong>No Telepone </strong>{{ $dosen->no_telp }}</p>
                    <p class="card-text"><strong>Email: </strong>{{ $dosen->email }}</p>
                    <p class="card-text"><strong>Alamat: </strong>{{ $dosen->alamat }}</p>
                    <hr>
                    <a href="/dashboard-dosen" class="btn btn-secondary">Kembali ke Daftar Dosen</a>
                </div>
                <div class="card-footer text-muted">
                    Data terakhir diperbarui: {{ \Carbon\Carbon::parse($dosen->updated_at)->format('d M Y H:i') }}
                </div>
            </div>
        </div>
    </div>
@endsection
