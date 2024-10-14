@extends('dashboard.layouts.main')
@section('title', 'Data Mahasiswa')
@section('navMhs', 'active')

@section('content')
    <h1>Daftar Mahasiswa Jurusan TI</h1>
    @if (session('pesan'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('pesan') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <a href="/dashboard-mahasiswa/create" class="btn btn-primary mb-2">Create Mahasiswa</a>
    <a href="/cetak-pdf/mahasiswa" target="_blank" class="btn btn-success mb-2">Cetak PDF</a>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nim</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Prodi</th>
            <th>Aksi</th>
        </tr>
        @foreach ($mahasiswas as $mahasiswa)
            <tr>
                <td>{{ $mahasiswas->firstItem() + $loop->index }}</td>
                <td>{{ $mahasiswa->nim }}</td>
                <td>{{ $mahasiswa->nama_lengkap }}</td>
                <td>{{ $mahasiswa->email }}</td>
                <td>{{ $mahasiswa->prodi->nama }}</td>
                <td>
                    <div class="d-flex">
                        <a title="Detail" href="/dashboard-mahasiswa/{{ $mahasiswa->id }}"><button class="btn btn-success me-2"
                                type="button"><i class="bi bi-eye"></i></button></a>
                        <a title="Edit Data" href="dashboard-mahasiswa/{{ $mahasiswa->id }}/edit"><button class="btn btn-warning  me-2"
                                type="button"><i class="bi bi-pencil"></i></button></a>
                        <form action="/dashboard-mahasiswa/{{ $mahasiswa->id }}" method="post" class="d-inline">
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
    {{ $mahasiswas->links() }}
@endsection
