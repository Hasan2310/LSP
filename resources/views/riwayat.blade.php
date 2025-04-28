@extends('components.layout')

@section('title', 'Riwayat Transaksi')

@section('content')
<div class="max-w-5xl mx-auto mt-6 space-y-6">
    <h2 class="text-2xl font-bold mb-4">Riwayat Transaksi</h2>

    @if($transaksis->isEmpty())
        <p class="text-gray-600">Belum ada transaksi.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($transaksis as $transaksi)
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Pesanan #{{ $transaksi->id }}</h3>

                    <div class="mb-4">
                        <p class="text-sm text-gray-600"><strong>Nama Pemesan:</strong> {{ $transaksi->nama_pemesan }}</p>
                        <p class="text-sm text-gray-600"><strong>Email:</strong> {{ $transaksi->email }}</p>
                        <p class="text-sm text-gray-600"><strong>No HP:</strong> {{ $transaksi->no_hp }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="text-sm text-gray-600"><strong>Maskapai:</strong> {{ $transaksi->maskapai->nama_maskapai }}</p>
                        <p class="text-sm text-gray-600"><strong>Jumlah Tiket:</strong> {{ $transaksi->jumlah_tiket }}</p>
                        <p class="text-sm text-gray-600"><strong>Total Harga:</strong> Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-600"><strong>Status:</strong> <span class="font-semibold">{{ $transaksi->status }}</span></p>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
