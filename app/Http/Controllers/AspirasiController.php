<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use Auth;
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

        // Determine the name and user_id based on login status
        if (Auth::check()) {
            $userId = Auth::id(); // Keep the ID so they can still manage it later!

            // If they checked the box, name is 'Anonim'. Otherwise, use their real account name.
            $nama = $request->has('anonim') ? 'Anonim' : Auth::user()->name;
        } else {
            $userId = null; // Guests have no ID
            $nama = $request->nama ?? 'Anonim'; // Use typed name or default to Anonim
        }

        Aspirasi::create([
            'user_id' => $userId,
            'nama' => $nama,
            'pesan' => $request->pesan,
        ]);

        return redirect()->back()->with('success', 'Aspirasi berhasil dikirim!');
    }

    // --- MANAGE PERSONAL ASPIRASI (Auth Required) ---

    // 1. Show only the logged-in user's Aspirasi
    public function myAspirasi()
    {
        // Using the relationship we defined in the User model!
        if (Auth::user()->isAdmin()) {
            $aspirasis = Aspirasi::latest()->get();
        } else {
            $aspirasis = Auth::user()->aspirasis()->latest()->get();
        }

        return view('aspirasi.user.my_aspirasi', compact('aspirasis'));
    }

    // 2. Show the Edit Form
    public function edit(Aspirasi $aspirasi)
    {
        // SECURITY: Ensure the user actually owns this Aspirasi
        if ($aspirasi->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action. You do not own this Aspirasi.');
        }

        return view('aspirasi.user.edit', compact('aspirasi'));
    }

    // 3. Process the Update
    public function update(Request $request, Aspirasi $aspirasi)
    {
        if ($aspirasi->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate(['message' => 'required|string']);

        $aspirasi->update([
            'message' => $request->message,
        ]);

        return redirect()->route('aspirasi.user.mine')->with('success', 'Aspirasi berhasil diperbarui!');
    }

    // 4. Process the Delete
    public function destroy(Aspirasi $aspirasi)
    {
        if ($aspirasi->user_id !== Auth::id() && ! Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized action. Anda tidak memiliki izin untuk menghapus ini.');
        }

        $aspirasi->delete();

        return redirect()->route('aspirasi.user.mine')->with('success', 'Aspirasi berhasil dihapus!');
    }
}
