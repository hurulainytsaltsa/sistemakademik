@extends('dashboard.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail Data Mata Kuliah</h1>
    </div>

    <div class="row">
        <div class="col-12 col-md-8 col-lg-6 mx-auto">
            <div class="card shadow rounded">
                <div class="card-header bg-primary text-white">
                    <h3>{{ $matakuliah->nama_mk }}</h3>
                </div>
                <div class="card-body">
                    <h5 class="card-title mb-3">Kode MK: {{ $matakuliah->kode_mk }}</h5>
                    <hr>
                    <p class="card-text"><strong>Semester: </strong>{{ $matakuliah->semester }}</p>
                    <p class="card-text"><strong>SKS </strong>{{ $matakuliah->sks }}</p>
                    <hr>
                    <a href="/dashboard-matakuliah" class="btn btn-secondary">Kembali ke Daftar Mata Kuliah</a>
                </div>
            </div>
        </div>
    </div>
@endsection
