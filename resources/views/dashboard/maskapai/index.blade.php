@extends('components.layout')

@section('content')
    <h1>Data Maskapai</h1>
    <a href="{{ route('maskapais.create') }}">Tambah Data Maskapai</a>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Maskapai</th>
                <th>Kota Keberangkatan</th>
                <th>Kota Tujuan</th>
                <th>Tanggal</th>
                <th>Jam Berangkat</th>
                <th>Jam Tiba</th>
                <th>Harga Tiket</th>
                <th>Kapasitas Kursi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($maskapais as $maskapai)
                <tr>
                    <td>{{ $maskapai->id }}</td>
                    <td>{{ $maskapai->nama_maskapai }}</td>
                    <td>{{ $maskapai->kota_keberangkatan }}</td>
                    <td>{{ $maskapai->kota_tujuan }}</td>
                    <td>{{ $maskapai->tanggal }}</td>
                    <td>{{ $maskapai->jam_berangkat }}</td>
                    <td>{{ $maskapai->jam_tiba }}</td>
                    <td>{{ $maskapai->harga_tiket }}</td>
                    <td>{{ $maskapai->kapasitas_kursi }}</td>
                    <td>
                        <a href="{{ route('maskapais.edit', $maskapai->id) }}">Edit</a>
                        <form action="{{ route('maskapais.destroy', $maskapai->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection