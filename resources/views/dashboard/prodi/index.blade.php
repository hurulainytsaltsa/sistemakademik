@extends('dashboard.layouts.main')
@section('title', 'Data Prodi')
@section('navProdi', 'active')

@section('content')
<h1>Daftar Prodi</h1>
@if (session('pesan'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('pesan') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <a href="/dashboard-prodi/create" class="btn btn-primary mb-2">Create Prodi</a>
    <a href="/cetak-pdf/prodi" target="_blank" class="btn btn-success mb-2">Cetak PDF</a>

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>ID</th>
        <th>Nama</th>
        <th>Aksi</th>
    </tr>
    @foreach ($prodis as $prodi)
    <tr>
        <td>{{ $loop->index + 1 }}</td>
        <td>{{ $prodi->id }}</td>
        <td>{{ $prodi->nama }}</td>
        <td>
            <div class="d-flex">
                <a title="Detail"  href="/dashboard-prodi/{{ $prodi->id }}"><button class="btn btn-success me-2"
                        type="button"><i class="bi bi-eye"></i></button></a>
                <a title="Edit Data" href="dashboard-prodi/{{ $prodi->id }}/edit"><button class="btn btn-warning  me-2"
                        type="button"><i class="bi bi-pencil"></i></button></a>
                <form action="/dashboard-prodi/{{ $prodi->id }}" method="post" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button title="Hapus Data" class="btn btn-danger" onclick="return confirm('Yakin mau hapus?? Yakin nihh?')">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </div>
        </td>


    </tr>
    @endforeach
</table>
@endsection
