@extends('dashboard.layouts.main')
@section('title', 'Data Dosen')
@section('navDosen', 'active')

@section('content')
<h1>Daftar Dosen Jurusan TI</h1>
    @if (session('pesan'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('pesan') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <a href="/dashboard-dosen/create" class="btn btn-primary mb-2">Create Dosen</a>
    <a href="/cetak-pdf/dosen" target="_blank" class="btn btn-success mb-2">Cetak PDF</a>

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Nik</th>
        <th>Nama</th>
        <th>Email</th>
        <th>No Telp</th>
        <th>Prodi</th>
        <th>Alamat</th>
        <th>Jabatan</th>
        <th>Aksi</th>
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
        <td>{{ $dosen->jabatan }}</td>
        <td>
                    <div class="d-flex">
                        <a title="Detail" href="/dashboard-dosen/{{ $dosen->id }}"><button class="btn btn-success me-2"
                                type="button"><i class="bi bi-eye"></i></button></a>
                        <a title="Edit Data" href="dashboard-dosen/{{ $dosen->id }}/edit"><button class="btn btn-warning  me-2"
                                type="button"><i class="bi bi-pencil"></i></button></a>
                        <form action="/dashboard-dosen/{{ $dosen->id }}" method="post" class="d-inline">
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
{{ $dosens->links() }}
@endsection
