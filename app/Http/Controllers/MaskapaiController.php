<?php

namespace App\Http\Controllers;

use App\Models\Maskapai;
use Illuminate\Http\Request;

class MaskapaiController extends Controller
{
    public function index()
    {
        $maskapais = Maskapai::all();
        return view('dashboard.maskapai.index', compact('maskapais'));
    }

    public function create()
    {
        return view('dashboard.maskapai.create');
    }

    public function store(Request $request)
    {
        Maskapai::create($request->all());
        return redirect()->route('maskapais.index');
    }

    public function edit($id)
    {
        $maskapai = Maskapai::findOrFail($id);
        return view('dashboard.maskapai.edit', compact('maskapai'));
    }

    public function update(Request $request, $id)
    {
        $maskapai = Maskapai::findOrFail($id);
        $maskapai->update($request->all());
        return redirect()->route('maskapais.index');
    }

    public function destroy($id)
    {
        $maskapai = Maskapai::findOrFail($id);
        $maskapai->delete();
        return redirect()->route('maskapais.index');
    }
}
