<header class="fixed top-0 left-0 z-100 w-full bg-transparent py-4">
  <div class="mx-4 lg:max-w-[85vw] lg:mx-auto px-4 py-3 rounded-2xl backdrop-blur-2xl bg-white/5">
    <nav class="flex items-center justify-between">
      <a href="/" class="size-12">
        <img src="{{ asset('images/hmit-logo.png') }}" class="w-full h-full" alt="hmit-logo">
      </a>

      {{-- Desktop nav links (hidden on mobile) --}}
      <ul id="nav-links" class="hidden lg:flex items-center justify-between gap-6">
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('about') }}">About HMIT</a></li>
        <li><a href="{{ route('services') }}">Services</a></li>
        <li><a href="{{ route('gallery') }}">Gallery</a></li>
        <li><a href="{{ route('blogs') }}">Blogs</a></li>
        <li><a href="{{ route('aspirasi.index') }}">Aspirasi</a></li>
        <li><a href="{{ route('contacts') }}">Contact Us</a></li>
      </ul>

      {{-- Hamburger button (visible on mobile only) --}}
      <button id="menu-toggle"
        class="lg:hidden flex flex-col justify-center items-center gap-1.5 w-10 h-10 cursor-pointer"
        aria-label="Toggle menu">
        <span class="menu-bar block w-6 h-0.5 bg-white rounded transition-all duration-300"></span>
        <span class="menu-bar block w-6 h-0.5 bg-white rounded transition-all duration-300"></span>
        <span class="menu-bar block w-6 h-0.5 bg-white rounded transition-all duration-300"></span>
      </button>

      <div class="hidden lg:flex gap-4">
        @auth
          <a href="{{ route('dashboard') }}" class="flex items-center justify-center hover:underline">Dashboard</a>
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
              class="px-3 py-2 text-red-500! cursor-pointer rounded-lg hover:text-white! hover:bg-red-500 transition-all border border-red-500">Logout</button>
          </form>
        @else
          <a href="{{ route('login') }}"
            class="px-3 py-2 text-black! rounded-lg hover:bg-white/60 transition-all bg-white">Login</a>
        @endauth
      </div>
    </nav>
  </div>
  {{-- Mobile nav menu --}}
  <div id="mobile-nav" class="mobile-nav">
    <ul class="flex flex-col items-center gap-6 py-8">
      <li><a href="{{ route('home') }}" class="mobile-nav-link">Home</a></li>
      <li><a href="{{ route('about') }}" class="mobile-nav-link">About HMIT</a></li>
      <li><a href="{{ route('services') }}" class="mobile-nav-link">Services</a></li>
      <li><a href="{{ route('gallery') }}" class="mobile-nav-link">Gallery</a></li>
      <li><a href="{{ route('blogs') }}" class="mobile-nav-link">Blogs</a></li>
      <li><a href="{{ route('aspirasi.index') }}" class="mobile-nav-link">Aspirasi</a></li>
      <li><a href="{{ route('contacts') }}" class="mobile-nav-link">Contact Us</a></li>
    </ul>
  </div>
</header>
