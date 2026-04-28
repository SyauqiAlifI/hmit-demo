@extends('layouts.app')

@section('title', 'My Aspirasi')

@section('content')
  <div class="w-full px-6 lg:max-w-[85%] mx-auto">
    <div class="w-full bg-zinc-800 px-6 py-4 rounded-xl shadow-xl my-8">
      @if (Auth::user()->isAdmin())
        <h2 class="text-white! font-bold text-2xl mb-4">Daftar Aspirasi HMIT</h2>
      @else
        <h2 class="text-white! font-bold text-2xl mb-4">Aspirasi Saya</h2>
      @endif

      @if (session('success'))
        <div class="bg-green-500/50 p-2 mb-4 rounded-lg text-white">{{ session('success') }}</div>
      @endif

      <table class="border border-white w-full">
        <tr class="border">
          <th class="text-start p-2 border">Tanggal</th>
          @if (Auth::user()->isAdmin())
            <th class="text-start p-2 border">Pengirim</th>
          @endif
          <th class="text-start p-2 border">Pesan</th>
          <th class="text-start p-2 border">Aksi</th>
        </tr>
        @foreach ($aspirasis as $aspirasi)
          <tr class="border">
            <td class="p-2 border">{{ $aspirasi->created_at->format('d M Y') }}</td>
            @if (Auth::user()->isAdmin())
              <td class="p-2 border">{{ $aspirasi->nama }}</td>
            @endif
            <td class="p-2 border">{{ $aspirasi->pesan }}</td>
            <td class="p-2 border flex gap-2">
              @if ($aspirasi->user_id === Auth::id())
                <a href="{{ route('aspirasi.user.edit', $aspirasi->id) }}"
                  class="hover:bg-orange-500 hover:text-white! cursor-pointer text-orange-500! border border-orange-500 px-3 py-1 rounded text-sm">
                  Edit
                </a> |
              @endif

              <form action="{{ route('aspirasi.user.destroy', $aspirasi->id) }}" method="POST"
                onsubmit="return confirm('Hapus aspirasi ini?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                  class="hover:bg-red-600 hover:text-white! cursor-pointer text-red-600! border border-red-600 px-3 py-1 rounded text-sm">
                  Hapus
                </button>
              </form>
            </td>
          </tr>
        @endforeach
      </table>

      <br>
      <a href="{{ route('aspirasi.index') }}"
        class="mt-6 px-3 py-2 rounded-lg hover:bg-white hover:text-black!
        transition-all border border-white">Buat
        Aspirasi</a>
      <a href="{{ route('dashboard') }}"
        class="mt-6 px-3 py-2 rounded-lg hover:bg-white hover:text-black!
        transition-all border border-white">Kembali
        ke Dashboard</a>
    </div>
  </div>
@endsection
