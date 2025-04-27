@extends('components.layout')

@section('content')
    <h1>Edit Maskapai</h1>
    <form action="{{ route('maskapais.update', $maskapai->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="nama_maskapai" value="{{ $maskapai->nama_maskapai }}"><br>
        <input type="text" name="kota_keberangkatan" value="{{ $maskapai->kota_keberangkatan }}"><br>
        <input type="text" name="kota_tujuan" value="{{ $maskapai->kota_tujuan }}"><br>
        <input type="date" name="tanggal" value="{{ $maskapai->tanggal }}"><br>
        <input type="time" name="jam_berangkat" value="{{ $maskapai->jam_berangkat }}"><br>
        <input type="time" name="jam_tiba" value="{{ $maskapai->jam_tiba }}"><br>
        <input type="number" name="harga_tiket" value="{{ $maskapai->harga_tiket }}"><br>
        <input type="number" name="kapasitas_kursi" value="{{ $maskapai->kapasitas_kursi }}"><br>
        <button type="submit">Update</button>
    </form>
@endsection