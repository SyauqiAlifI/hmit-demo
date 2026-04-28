@extends('layouts.app')

@section('title', 'Login')

@section('content')
  <div
    class="flex flex-col justify-center items-center px-6 py-4 shadow-xl rounded-2xl bg-zinc-800 w-fit max-w-[85vw] mx-auto my-8 space-y-4">
    <h2 class="font-bold text-2xl">Login</h2>
    <form action="{{ route('login') }}" method="POST" class="flex flex-col gap-4 w-full">
      @csrf
      <div class="w-full">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" value="{{ old('username') }}" required
          class="w-full bg-zinc-700 p-2 mt-2 rounded" autocomplete="username">
        @error('username')
          <div style="color: red;">{{ $message }}</div>
        @enderror
      </div>
      <div class="w-full">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required class="w-full bg-zinc-700 p-2 mt-2 rounded"
          autocomplete="current-password">
        @error('password')
          <div style="color: red;">{{ $message }}</div>
        @enderror
      </div>
      <button type="submit"
        class="py-2 mt-2 bg-white text-black! hover:bg-white/80 transition-all rounded-lg cursor-pointer">Login</button>
    </form>
  </div>
@endsection
