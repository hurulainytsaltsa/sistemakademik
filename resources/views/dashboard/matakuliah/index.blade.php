@extends('dashboard.layouts.main')
@section('title', 'Data Mata Kuliah')
@section('navMatakuliah', 'active')

@section('content')
<h1>Daftar Mata Kuliah Jurusan TI</h1>
    @if (session('pesan'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('pesan') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <a href="/dashboard-matakuliah/create" class="btn btn-primary mb-2">Create Mata Kuliah</a>
    {{-- <a href="/cetak-pdf/dosen" target="_blank" class="btn btn-success mb-2">Cetak PDF</a> --}}

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Kode Mata Kuliah</th>
        <th>Nama Mata Kuliah</th>
        <th>SKS</th>
        <th>Semester</th>
        <th>Aksi</th>
    </tr>
    @foreach ($matakuliahs as $matakuliah)
    <tr>
        <td>{{ $matakuliahs->firstItem() + $loop->index }}</td>
        <td>{{ $matakuliah->kode_mk }}</td>
        <td>{{ $matakuliah->nama_mk }}</td>
        <td>{{ $matakuliah->sks }}</td>
        <td>{{ $matakuliah->semester }}</td>
        <td>
                    <div class="d-flex">
                        <a title="Detail" href="/dashboard-matakuliah/{{ $matakuliah->id }}"><button class="btn btn-success me-2"
                                type="button"><i class="bi bi-eye"></i></button></a>
                        <a title="Edit Data" href="dashboard-matakuliah/{{ $matakuliah->id }}/edit"><button class="btn btn-warning  me-2"
                                type="button"><i class="bi bi-pencil"></i></button></a>
                        <form action="/dashboard-matakuliah/{{ $matakuliah->id }}" method="post" class="d-inline">
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
{{ $matakuliahs->links() }}
@endsection
