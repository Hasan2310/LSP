@extends('components.layout')

@section('content')
<h1>Data Transaksi</h1>
<a href="{{ route('transaksis.create') }}">Tambah Transaksi</a>
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>Nama Pemesan</th>
            <th>Email</th>
            <th>No HP</th>
            <th>Maskapai</th>
            <th>Jumlah Tiket</th>
            <th>Total Harga</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transaksis as $transaksi)
            <tr>
                <td>{{ $transaksi->nama_pemesan }}</td>
                <td>{{ $transaksi->email }}</td>
                <td>{{ $transaksi->no_hp }}</td>
                <td>{{ $transaksi->maskapai->nama_maskapai }}</td>
                <td>{{ $transaksi->jumlah_tiket }}</td>
                <td>Rp. {{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                <td>{{ $transaksi->status }}</td>
                <td>
                    <a href="{{ route('transaksis.edit', $transaksi->id) }}">Edit</a>
                    <form action="{{ route('transaksis.destroy', $transaksi->id) }}" method="POST" style="display:inline;">
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
