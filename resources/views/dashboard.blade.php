@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
  <div class="w-full px-6 lg:max-w-[85%] mx-auto">
    <div class="w-full bg-zinc-800 px-6 py-4 rounded-xl shadow-xl my-8">
      @if (session('success'))
        <div class="bg-green-500/50 p-2 mb-4 rounded-lg text-white">
          {{ session('success') }}
        </div>
      @endif
      @if (session('error'))
        <div class="bg-red-500/50 p-2 mb-4 rounded-lg text-white">
          {{ session('error') }}
        </div>
      @endif
      <h1 class="text-white! font-bold text-2xl">Dashboard {{ Auth::user()->role }}</h1>
      <div class="mt-6 space-y-2">
        <h2 class="text-xl">Selamat datang, {{ Auth::user()->name }}!</h2>
        <hr class="my-6">
        @if (Auth::user()->isAdmin())
          <div class="w-full">
            <h1 class="text-white! font-bold text-2xl mb-4">Daftar Anggota HMIT</h1>
            <table class="border border-white w-full">
              <tr class="border">
                <th class="text-start p-2 border">No.</th>
                <th class="text-start p-2 border">Nama</th>
                <th class="text-start p-2 border">Username</th>
                <th class="text-start p-2 border">Role</th>
                <th class="text-start p-2 border">Action</th>
              </tr>
              @foreach ($users as $user)
                <tr class="border">
                  <td class="p-2 border">{{ $loop->iteration }}</td>
                  <td class="p-2 border">{{ $user->name }}</td>
                  <td class="p-2 border">{{ $user->username }}</td>
                  <td class="p-2 border">{{ $user->role }}</td>
                  <td class="p-2 border">
                    <div class="flex gap-2">
                      @if ($user->id === Auth::id() || !Auth::user()->isAdmin())
                        <p class="text-sm text-white/30!"> x </p>
                      @else
                        <a href="{{ route('admin.users.edit', $user->id) }}"
                          class="hover:bg-orange-500 hover:text-white! cursor-pointer text-orange-500! border border-orange-500 px-3 py-1 rounded text-sm">
                          Edit
                        </a>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus akun {{ $user->name }}?');">
                          @csrf
                          @method('DELETE')
                          <button type="submit"
                            class="hover:bg-red-600 hover:text-white! cursor-pointer text-red-600! border border-red-600 px-3 py-1 rounded text-sm">
                            Hapus Akun
                          </button>
                        </form>
                      @endif
                    </div>
                  </td>
                </tr>
              @endforeach
            </table>
          </div>
        @endif
        @if (Auth::user()->isAdmin())
          <div class="mt-6 mb-6">
            <a href="{{ route('admin.register') }}"
              class="px-3 py-2 rounded-lg hover:bg-white hover:text-black! transition-all border border-white">
              Tambah Akun Anggota HMIT</a>
          </div>
        @endif
        <a href="{{ route('aspirasi.user.mine') }}"
          class="mt-6 px-3 py-2 rounded-lg hover:bg-white hover:text-black!
          transition-all border border-white">Kelola
          Aspirasi</a>
      </div>
    </div>
  </div>
@endsection
