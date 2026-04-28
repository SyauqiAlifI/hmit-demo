{{-- This is unsued due to admin restricted registration --}}

@extends('layouts.app')

@section('title', 'register')

@section('content')
  <div
    class="flex flex-col justify-center items-center px-6 py-4 shadow-xl rounded-2xl bg-zinc-800 w-fit max-w-[85vw] mx-auto my-8 space-y-4">
    <h2 class="font-bold text-2xl">Register</h2>
    <form action="{{ route('register') }}" method="POST" class="flex flex-col gap-4 w-full">
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
    <p class="mt-2 text-white/60!">Sudah menjadi member HMIT? <a href="{{ route('login') }}"
        class="text-orange-400! underline hover:text-orange-500! transition-all">Login disini</a></p>
  </div>
@endsection
