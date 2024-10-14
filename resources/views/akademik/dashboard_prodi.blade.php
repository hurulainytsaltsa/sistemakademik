@extends('dashboard.layouts.main')
@section('title', 'Data Prodi')
@section('navProdi', 'active')

@section('content')
<h1>Daftar Dosen</h1>
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>ID</th>
        <th>Nama</th>
    </tr>
    @foreach ($prodis as $prodi)
    <tr>
        <td>{{ $loop->index + 1 }}</td>
        <td>{{ $prodi->id }}</td>
        <td>{{ $prodi->nama }}</td>
    </tr>
    @endforeach
</table>
@endsection
