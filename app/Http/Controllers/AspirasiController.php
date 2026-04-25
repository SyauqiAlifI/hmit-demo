<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use Illuminate\Http\Request;

class AspirasiController extends Controller
{
    public function index()
    {
        $aspirasis = Aspirasi::latest()->get();
        return view('aspirasi.index', compact('aspirasis'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'nullable|string|max:255',
            'pesan' => 'required',
        ]);

        Aspirasi::create([
            'nama' => $request->nama ?? 'Anonymous',
            'pesan' => $request->pesan,
        ]);

        return redirect()->back()->with('success', 'Aspirasi berhasil dikirim!');
    }
}
