@extends('components.layout')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h1>Tambah Transaksi</h1>
<form action="{{ route('transaksis.store') }}" method="POST">
    @csrf
    <input type="text" name="nama_pemesan" placeholder="Nama Pemesan"><br>
    <input type="email" name="email" placeholder="Email"><br>
    <input type="text" name="no_hp" placeholder="No HP"><br>

    <select name="maskapai_id">
        @foreach ($maskapais as $maskapai)
            <option value="{{ $maskapai->id }}">{{ $maskapai->nama_maskapai }}</option>
        @endforeach
    </select><br>

    <input type="number" name="jumlah_tiket" placeholder="Jumlah Tiket"><br>

    <button type="submit">Simpan</button>
</form>
@endsection
