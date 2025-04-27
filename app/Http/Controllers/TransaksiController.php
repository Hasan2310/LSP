<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Maskapai;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::all();
        return view('dashboard.transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        $maskapais = Maskapai::all();
        return view('dashboard.transaksi.create', compact('maskapais'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pemesan' => 'required|string|max:255',
            'email' => 'required|email',
            'no_hp' => 'required|string|max:20',
            'maskapai_id' => 'required|exists:maskapais,id',
            'jumlah_tiket' => 'required|integer|min:1',
        ]);

        $maskapai = \App\Models\Maskapai::findOrFail($request->maskapai_id);

        // Cek apakah jumlah kursi cukup
        if ($maskapai->kapasitas_kursi < $request->jumlah_tiket) {
            return back()->withErrors('Jumlah kursi tidak mencukupi.');
        }

        // Hitung total harga
        $total_harga = $maskapai->harga_tiket * $request->jumlah_tiket;

        // Buat transaksi
        Transaksi::create([
            'nama_pemesan' => $request->nama_pemesan,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'maskapai_id' => $request->maskapai_id,
            'jumlah_tiket' => $request->jumlah_tiket,
            'total_harga' => $total_harga,
            'status' => 'Pending',
        ]);

        // Kurangi jumlah kursi maskapai
        $maskapai->update([
            'kapasitas_kursi' => $maskapai->kapasitas_kursi - $request->jumlah_tiket
        ]);

        return redirect()->route('transaksis.index')->with('success', 'Transaksi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $maskapais = Maskapai::all();
        return view('dashboard.transaksi.edit', compact('transaksi', 'maskapais'));
    }
    
    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'nama_pemesan' => 'required|string|max:255',
            'email' => 'required|email',
            'no_hp' => 'required|string|max:20',
            'maskapai_id' => 'required|exists:maskapais,id',
            'jumlah_tiket' => 'required|integer|min:1',
        ]);
    
        $maskapai = \App\Models\Maskapai::findOrFail($request->maskapai_id);
    
        // Balikin dulu kapasitas kursi ke maskapai berdasarkan jumlah tiket lama
        $maskapai->kapasitas_kursi += $transaksi->jumlah_tiket;
        $maskapai->save();
    
        // Cek lagi apakah kapasitas cukup setelah perubahan
        if ($maskapai->kapasitas_kursi < $request->jumlah_tiket) {
            return back()->withErrors('Jumlah kursi tidak mencukupi.');
        }
    
        // Hitung total harga baru
        $total_harga = $maskapai->harga_tiket * $request->jumlah_tiket;
    
        // Update transaksi
        $transaksi->update([
            'nama_pemesan' => $request->nama_pemesan,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'maskapai_id' => $request->maskapai_id,
            'jumlah_tiket' => $request->jumlah_tiket,
            'total_harga' => $total_harga,
        ]);
    
        // Kurangi kapasitas kursi maskapai sesuai jumlah tiket baru
        $maskapai->kapasitas_kursi -= $request->jumlah_tiket;
        $maskapai->save();
    
        return redirect()->route('transaksis.index')->with('success', 'Transaksi berhasil diupdate');
    }
    
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();
        return redirect()->route('transaksis.index');
    }
}
