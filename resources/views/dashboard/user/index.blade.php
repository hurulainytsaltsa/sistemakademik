@extends('dashboard.layouts.main')
@section('title', 'Data User')
@section('navMhs', 'active')

@section('content')
    <h1>Daftar Users</h1>
    @if (session('pesan'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('pesan') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <a href="/dashboard-user/create" class="btn btn-primary mb-2">Create User</a>
    <a href="/cetak-pdf/user" target="_blank" class="btn btn-success mb-2">Cetak PDF</a>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $users->firstItem() + $loop->index }}</td>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <div class="d-flex">
                        <a title="Detail" href="/dashboard-user/{{ $user->id }}"><button class="btn btn-success me-2"
                                type="button"><i class="bi bi-eye"></i></button></a>
                        <a title="Edit Data" href="dashboard-user/{{ $user->id }}/edit"><button class="btn btn-warning  me-2"
                                type="button"><i class="bi bi-pencil"></i></button></a>
                        <form action="/dashboard-user/{{ $user->id }}" method="post" class="d-inline">
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
    {{ $users->links() }}
@endsection
