@extends('layouts.app')

@section('title', 'Aspirasi')

@section('content')
  <div class="w-full px-6 lg:max-w-[45%] mx-auto">
    <div class="w-full bg-zinc-800 px-6 py-4 rounded-xl shadow-xl my-8">
      <div class="w-full flex flex-col gap-4">
        <div class="w-full">
          <h1 class="text-center font-bold text-2xl pb-4">Kotak Aspirasi HMIT</h1>
          <form action="{{ route('aspirasi.store') }}" method="POST" class="space-y-4 mb-4">
            @csrf
            @guest
              <div class="space-y-2">
                <label class="block font-medium">Nama Anda (Opsional)</label>
                <input type="text" name="nama" class="w-full bg-zinc-700 p-2 rounded"
                  placeholder="Tuliskan nama anda..." autocomplete="name">
              </div>
            @endguest
            <div class="space-y-2">
              <label class="block font-medium">Pesan / Aspirasi Anda untuk HMIT <span
                  class="text-red-500!">*</span></label>
              <textarea name="pesan" rows="4" class="w-full bg-zinc-700 p-2 rounded" required
                placeholder="Tulis keluhan atau saran di sini..."></textarea>
            </div>
            {{-- Checkbox as anonim (ONLY FOR LOGGED IN USERS) --}}
            @auth
              <div class="flex items-center space-x-2">
                <input type="checkbox" name="anonim" id="anonim" value="1"
                  class="w-4 h-4 text-blue-600 bg-zinc-700 border-gray-600 rounded cursor-pointer">
                <label for="anonim" class="font-medium cursor-pointer select-none">Sembunyikan nama saya</label>
              </div>
            @endauth
            <center>
              <button type="submit" class="py-2 px-4 bg-white hover:bg-white/90 rounded cursor-pointer text-black!">
                Kirim Aspirasi
              </button>
            </center>
          </form>
        </div>
        <div class="border-b-2 border-white/20"></div>
        <div class="flex flex-col space-y-4">
          <div class="flex flex-col justify-center items-center gap-2">
            <h1 class="font-bold text-2xl">Daftar Aspirasi</h1>
            <span class="text-xs text-gray-400">{{ $aspirasis->count() }} aspirasi</span>
          </div>
          @forelse($aspirasis as $aspirasi)
            <div class="border-b pb-4">
              <div class="flex flex-col-reverse justify-start items-start lg:flex-row lg:justify-between lg:items-center">
                <h4 class="font-bold text-gray-800"><span class="text-zinc-400! font-normal">dari</span>
                  {{ $aspirasi->nama }}</h4>
                <span class="text-xs text-gray-400">{{ $aspirasi->created_at->diffForHumans() }}</span>
              </div>
              <p class="text-gray-600 mt-1">{{ $aspirasi->pesan }}</p>
            </div>
          @empty
            <p class="text-gray-500 italic">Belum ada aspirasi yang masuk.</p>
          @endforelse
        </div>
      </div>
    </div>
  </div>
@endsection
