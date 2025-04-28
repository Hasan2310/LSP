@extends('components.layout')

@section('title', 'Tiket')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
    @foreach ($maskapais as $maskapai)
        <div class="bg-white shadow-md rounded-lg p-4">
            <h2 class="text-xl font-bold mb-2">{{ $maskapai->nama_maskapai }}</h2>
            <p><strong>Dari:</strong> {{ $maskapai->kota_keberangkatan }}</p>
            <p><strong>Tujuan:</strong> {{ $maskapai->kota_tujuan }}</p>
            <p><strong>Tanggal:</strong> {{ $maskapai->tanggal }}</p>
            <p><strong>Jam:</strong> {{ $maskapai->jam_berangkat }} - {{ $maskapai->jam_tiba }}</p>
            <p><strong>Harga:</strong> Rp {{ number_format($maskapai->harga_tiket) }}</p>
            <p><strong>Sisa Kursi:</strong> {{ $maskapai->kapasitas_kursi }}</p>
            <a href="{{ route('transaksis.create', ['maskapai_id' => $maskapai->id]) }}"
               class="mt-4 inline-block bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">
                Pesan
            </a>
        </div>
    @endforeach
</div>
@endsection
