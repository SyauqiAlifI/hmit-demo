@extends('layouts.app')

@section('title', 'Tambah Anggota HMIT')

@section('content')
  <div class="w-screen h-screen flex items-center justify-center">
    <div
      class="flex flex-col justify-center items-center px-6 py-4 shadow-xl rounded-2xl bg-zinc-800 min-w-fit max-w-[85vw] mx-auto my-8 space-y-4">
      <h2 class="font-bold text-2xl">Tambah Akun Anggota HMIT</h2>
      <form action="{{ route('admin.register') }}" method="POST" class="flex flex-col gap-4 w-full">
        @csrf
        <div class="w-full">
          <label for="name">Nama</label><br>
          <input type="text" id="name" name="name" value="{{ old('name') }}" required
            class="w-full bg-zinc-700 p-2 mt-2 rounded" autocomplete="name">
          @error('name')
            <div style="color: red;">{{ $message }}</div>
          @enderror
        </div>
        <div class="w-full">
          <label for="username">Username</label><br>
          <input type="text" id="username" name="username" value="{{ old('username') }}" required
            class="w-full bg-zinc-700 p-2 mt-2 rounded" autocomplete="username">
          @error('username')
            <div style="color: red;">{{ $message }}</div>
          @enderror
        </div>
        <div class="w-full">
          <label for="password">Password</label><br>
          <input type="password" id="password" name="password" required class="w-full bg-zinc-700 p-2 mt-2 rounded"
            autocomplete="new-password">
          @error('password')
            <div style="color: red;">{{ $message }}</div>
          @enderror
        </div>
        <div class="w-full">
          <label for="password_confirmation">Konfirmasi Password</label><br>
          {{-- Must be named password_confirmation for Laravel's 'confirmed' rule to work --}}
          <input type="password" id="password_confirmation" name="password_confirmation" required
            class="w-full bg-zinc-700 p-2 mt-2 rounded" autocomplete="new-password">
        </div>
        <button type="submit"
          class="py-2 mt-2 bg-white text-black! hover:bg-white/80 transition-all rounded-lg cursor-pointer">Daftar</button>
      </form>
    </div>
  </div>
@endsection
