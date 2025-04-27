@extends('components.layout')

@section('content')
    <h1>Tambah Maskapai</h1>
    <form action="{{ route('maskapais.store') }}" method="POST">
        @csrf
        <input type="text" name="nama_maskapai" placeholder="Nama Maskapai"><br>
        <input type="text" name="kota_keberangkatan" placeholder="Kota Keberangkatan"><br>
        <input type="text" name="kota_tujuan" placeholder="Kota Tujuan"><br>
        <input type="date" name="tanggal"><br>
        <input type="time" name="jam_berangkat"><br>
        <input type="time" name="jam_tiba"><br>
        <input type="number" name="harga_tiket" placeholder="Harga Tiket"><br>
        <input type="number" name="kapasitas_kursi" placeholder="Kapasitas Kursi"><br>
        <button type="submit">Simpan</button>
    </form>
@endsection