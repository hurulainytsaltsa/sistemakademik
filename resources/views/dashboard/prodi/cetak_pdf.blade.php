<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate PDF</title>
</head>
<body>
    <h1 class="h2">Daftar Jurusan TI</h1>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama</th>
        </tr>
        @foreach($prodis as $prodi)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $prodi->nama }}</td>

        </tr>
        @endforeach
    </table>
</body>
</html>
