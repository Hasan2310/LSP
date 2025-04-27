@extends('components.layout')

@section('content')
<h1>Edit Transaksi</h1>
<form action="{{ route('transaksis.update', $transaksi->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="nama_pemesan" value="{{ $transaksi->nama_pemesan }}"><br>
    <input type="email" name="email" value="{{ $transaksi->email }}"><br>
    <input type="text" name="no_hp" value="{{ $transaksi->no_hp }}"><br>

    <select name="maskapai_id">
        @foreach ($maskapais as $maskapai)
            <option value="{{ $maskapai->id }}" {{ $transaksi->maskapai_id == $maskapai->id ? 'selected' : '' }}>
                {{ $maskapai->nama_maskapai }}
            </option>
        @endforeach
    </select><br>

    <input type="number" name="jumlah_tiket" value="{{ $transaksi->jumlah_tiket }}"><br>

    <select name="status">
        <option value="Pending" {{ $transaksi->status == 'Pending' ? 'selected' : '' }}>Pending</option>
        <option value="Confirmed" {{ $transaksi->status == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
        <option value="Rejected" {{ $transaksi->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
    </select><br>

    <button type="submit">Update</button>
</form>
@endsection
