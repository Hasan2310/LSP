@extends('components.layout')

@section('title', 'Pesan Tiket')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow-md">
    <h2 class="text-2xl font-bold mb-4">Pesan Tiket: {{ $maskapai->nama_maskapai }}</h2>
    <form method="POST" action="{{ route('transaksis.store') }}">
        @csrf
        <input type="hidden" name="maskapai_id" value="{{ $maskapai->id }}">

        <div class="mb-4">
            <label for="nama_pemesan" class="block text-sm font-medium">Nama Pemesan</label>
            <input type="text" name="nama_pemesan" value="{{ Auth::user()->name }}" class="w-full border rounded px-3 py-2" required readonly>
        </div>
        
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium">Email</label>
            <input type="email" name="email" value="{{ Auth::user()->email }}" class="w-full border rounded px-3 py-2" required readonly>
        </div>        

        <div class="mb-4">
            <label for="no_hp" class="block text-sm font-medium">No HP</label>
            <input type="text" name="no_hp" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label for="jumlah_tiket" class="block text-sm font-medium">Jumlah Tiket</label>
            <input type="number" name="jumlah_tiket" class="w-full border rounded px-3 py-2" required min="1" max="{{ $maskapai->kapasitas_kursi }}">
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Checkout
        </button>
    </form>
</div>
@endsection
