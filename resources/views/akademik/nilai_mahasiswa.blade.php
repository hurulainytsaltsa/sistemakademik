@extends('layouts.main')

@section('content')

<h1>Nilai Mahasiswa</h1>
        <table class="table table-bordered">
            <tr>
                <th>Nama</th>
                <th>NIM</th>
                <th>Total Nilai</th>
            </tr>
            <tr>
                <td>{{ $nama }}</td>
                <td>{{ $nim }}</td>
                <td>{{ $total_nilai }}</td>
            </tr>
        </table>
@endsection
