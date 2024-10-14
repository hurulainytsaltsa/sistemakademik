@extends('layouts.main')
@section('title', 'Data Dosen')
@section('navDosen', 'active')

{{-- @section('content')
<h1>Daftar Dosen</h1>
<ol>
    @forelse ($dosen as $namaDosen)
    <li>{{ $namaDosen }}</li>
    @empty
    <div class="alert alert-warning d-inline-block">
        Datat tidak ada..Silahkan isi array untuk data dosen!</div>
        @endforelse
</ol>
@endsection --}}

@section('content')
<h1>Daftar Dosen</h1>
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Nik</th>
        <th>Nama</th>
        <th>Email</th>
        <th>No Telp</th>
        <th>Prodi</th>
        <th>Alamat</th>
    </tr>
    @foreach ($dosens as $dosen)
    <tr>
        <td>{{ $dosens->firstItem() + $loop->index }}</td>
        <td>{{ $dosen->nik }}</td>
        <td>{{ $dosen->nama }}</td>
        <td>{{ $dosen->email }}</td>
        <td>{{ $dosen->no_telp }}</td>
        <td>{{ $dosen->prodi->nama }}</td>
        <td>{{ $dosen->alamat }}</td>
    </tr>
    @endforeach
</table>
{{ $dosens->links() }}
@endsection
