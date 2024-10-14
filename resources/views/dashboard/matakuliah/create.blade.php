@extends('dashboard.layouts.main')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Input Data Mata Kuliah</h1>
  </div>

  <div class="row">
    <div class="col-6">


<form action="/dashboard-matakuliah" method="post">
    @csrf
    <div class="mb-3">
        <label for="kode_mk" class="form-label">Kode Mata Kuliah</label>
        <input type="text" class="form-control @error('kode_mk') is-invalid
        @enderror" name="kode_mk" id="kode_mk" value="{{ old('kode_mk') }}">
        @error('kode_mk')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="nama_mk" class="form-label">Nama Mata Kuliah</label>
        <input type="text" class="form-control @error('nama_mk') is-invalid
        @enderror" name="nama_mk" id="nama_mk" value="{{ old('nama_mk') }}">
        @error('nama_mk')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

      <div class="mb-3">
        <label for="sks" class="form-label">SKS</label>
        <input type="number" class="form-control @error('sks') is-invalid
        @enderror" name="sks" id="sks" value="{{ old('sks') }}">
        @error('sks')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

    <div class="mb-3">
        <label for="semester" class="form-label">Semester</label>
        <input type="number" class="form-control @error('semester') is-invalid
        @enderror" name="semester" id="semester" value="{{ old('semester') }}">
        @error('semester')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

        <input type="submit" class="btn btn-primary" name="submit">
      </div>
</form>
</div>
</div>
@endsection
