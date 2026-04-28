@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
  <div class="w-screen h-screen flex items-center justify-center">
    <div
      class="flex flex-col justify-center items-center px-6 py-4 shadow-xl rounded-2xl bg-zinc-800 min-w-[30vw] max-w-[85vw] mx-auto my-8 space-y-4">
      <h2 class="text-white! text-2xl">Edit Akun: {{ $user->name }}</h2>

      {{-- Notice the action points to 'update' and uses @method('PUT') --}}
      <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="flex flex-col gap-4 w-full">
        @csrf
        @method('PUT')
        <div class="w-full">
          <label for="name">Nama</label><br>
          <input type="text" id="name" name="name" value="{{ old('name') }}" required
            class="w-full bg-zinc-700 p-2 mt-2 rounded" autocomplete="name" placeholder="{{ $user->name }}">
          @error('name')
            <div style="color: red;">{{ $message }}</div>
          @enderror
        </div>
        <div class="w-full">
          <label for="username">Username</label><br>
          <input type="text" id="username" name="username" value="{{ old('username') }}" required
            class="w-full bg-zinc-700 p-2 mt-2 rounded" autocomplete="username" placeholder="{{ $user->username }}">
          @error('username')
            <div style="color: red;">{{ $message }}</div>
          @enderror
        </div>
        <div class="w-full">
          <label for="role">Role</label><br>

          <select id="role" name="role" required
            class="w-full bg-zinc-700 text-white p-2 mt-2 rounded focus:ring-blue-500 focus:border-blue-500">
            <option value="anggota" {{ old('role', $user->role) === 'anggota' ? 'selected' : '' }}>
              Anggota HMIT
            </option>
            <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>
              Admin
            </option>
          </select>

          @error('role')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
          @enderror
        </div>
        {{-- <div class="w-full">
          <label for="password">Password</label><br>
          <input type="password" id="password" name="password" required class="w-full bg-zinc-700 p-2 mt-2 rounded"
            autocomplete="new-password">
          @error('password')
            <div style="color: red;">{{ $message }}</div>
          @enderror
        </div> --}}

        {{-- Note: Best practice is to leave password updates to a separate specific form,
             so we don't include it here to keep things simple and secure. --}}

        <button type="submit"
          class="flex-1 py-2 rounded-lg cursor-pointer bg-white text-black! hover:bg-white/60">Simpan</button>
        <a href="{{ route('dashboard') }}"
          class="flex-1 text-center py-2 rounded-lg border border-red-500 text-red-500! hover:bg-red-500 hover:text-white!">Batal</a>
        <div class="flex gap-2 w-full items-center justify-center">
        </div>
      </form>
    </div>
  </div>
