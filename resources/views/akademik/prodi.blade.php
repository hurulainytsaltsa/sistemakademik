@extends('layouts.main')
@section('title', 'Data Prodi')
@section('navProdi', 'active')

@section('content')
<h1>Daftar Dosen</h1>
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>ID</th>
        <th>Nama</th>
        {{-- <th>Aksi</th> --}}
    </tr>
    @foreach ($prodis as $prodi)
    <tr>
        <td>{{ $loop->index + 1 }}</td>
        <td>{{ $prodi->id }}</td>
        <td>{{ $prodi->nama }}</td>
        {{-- <td>
            <div class="d-flex">
                <button class="btn btn-warning  me-2" type="button">EDIT</button>
                <button class="btn btn-danger " type="button">HAPUS</button>
            </div>
        </td> --}}
    </tr>
    @endforeach
</table>
@endsection
