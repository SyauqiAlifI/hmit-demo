<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // 1. Show the Edit Form
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    // 2. Process the Update
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'role' => 'required|in:admin,anggota'
        ]);

        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'role' => $request->role,
        ]);

        return redirect()->route('dashboard')->with('success', 'Akun berhasil diperbarui!');
    }

    // 3. Process the Delete
    public function destroy(User $user)
    {
        // Safety check: Prevent the admin from accidentally deleting themselves!
        if ($user->id === Auth::id()) {
            return back()->withErrors('Anda tidak bisa menghapus akun Anda sendiri.');
        }

        $user->delete();

        return redirect()->route('dashboard')->with('success', 'Akun berhasil dihapus!');
    }
}
